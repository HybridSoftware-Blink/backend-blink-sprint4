# Blink - Electric Mobility Fleet Management API

## Project Overview

Blink is a comprehensive backend API platform designed for electric mobility fleet management. The system provides real-time tracking, telemetry processing, and multi-tenant fleet administration for both corporate (B2B) and individual (B2C) clients. Built with Laravel and deployed in a containerized environment, Blink handles high-frequency IoT data streams while maintaining robust relational data integrity.

## System Architecture

### Hybrid Database Model

Blink employs a **hybrid SQL + NoSQL architecture** to optimize performance and scalability:

- **MySQL (Relational Data)**
  - Manages core business entities: Users, Tenants, Vehicles, Reservations, and Tickets
  - Ensures ACID compliance for transactional operations
  - Maintains referential integrity across entities
  - Ideal for complex queries and reporting

- **MongoDB (Telemetry & IoT Data)**
  - Handles high-frequency sensor data: GPS coordinates, battery levels, speed metrics
  - Supports flexible schema for evolving IoT payloads
  - Optimized for write-heavy workloads (up to 1000+ writes/second per vehicle)
  - Enables time-series analysis and geospatial queries

### Multi-Tenant Architecture

The platform supports **tenant isolation** at the database level:
- Corporate tenants manage fleet pools with role-based access control
- Individual users operate in isolated contexts
- Shared infrastructure with tenant-scoped data separation

## Entity Relationship

### Core Entities

```
Tenant (1) ──< has many >── (N) Users
Tenant (1) ──< owns >─────── (N) Vehicles
User (1) ──< creates >────── (N) Reservations
Vehicle (1) ──< receives >── (N) Telemetry Records
Vehicle (1) ──< generates >─ (N) Tickets
```

**Key Relationships:**
- Each **Tenant** owns multiple vehicles and users
- **Users** belong to a tenant and can create reservations
- **Vehicles** are assigned to tenants and generate telemetry data
- **Reservations** link users to vehicles with time slots
- **Tickets** track maintenance and support issues

## API Endpoints

### Authentication

#### **POST** `/api/v1/auth/login`
Authenticate users and issue API tokens.

**Request Body:**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "token": "1|abcdef123456...",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "user@example.com",
    "role": "fleet_manager"
  }
}
```

#### **POST** `/api/v1/auth/register`
Register new users.

#### **POST** `/api/v1/auth/logout`
Revoke current access token.

#### **POST** `/api/v1/auth/logout-all`
Revoke all user tokens.

#### **GET** `/api/v1/auth/me`
Retrieve authenticated user profile.

### Telemetry (IoT Integration)

#### **POST** `/api/v1/telemetry`
Receive real-time telemetry data from Raspberry Pi nodes.

**Request Body:**
```json
{
  "vehicle_id": "VH-2024-001",
  "timestamp": "2026-01-28T10:30:00Z",
  "location": {
    "latitude": 41.3851,
    "longitude": 2.1734
  },
  "battery_level": 87.5,
  "speed": 32.4,
  "status": "in_use"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Telemetry data recorded"
}
```

### Vehicles

#### **GET** `/api/v1/vehicles`
Fetch fleet status and vehicle inventory.

**Query Parameters:**
- `status` (optional): Filter by status (`available`, `in_use`, `maintenance`)
- `tenant_id` (optional): Filter by tenant

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "license_plate": "ABC-1234",
      "model": "Tesla Model 3",
      "status": "available",
      "battery_level": 92.3,
      "location": {
        "latitude": 41.3851,
        "longitude": 2.1734
      }
    }
  ]
}
```

#### **POST** `/api/v1/vehicles`
Register new vehicle.

#### **PATCH** `/api/v1/vehicles/{id}/location`
Update vehicle GPS coordinates.

#### **GET** `/api/v1/vehicles/{id}/reservations`
Retrieve vehicle reservation history.

### Reservations

#### **GET** `/api/v1/reservations`
List all reservations.

#### **POST** `/api/v1/reservations`
Create new reservation.

#### **PATCH** `/api/v1/reservations/{id}/status`
Update reservation status.

### Tickets

#### **GET** `/api/v1/tickets`
Fetch support tickets.

#### **POST** `/api/v1/tickets`
Create maintenance or support ticket.

#### **PATCH** `/api/v1/tickets/{id}/status`
Update ticket status.

#### **PATCH** `/api/v1/tickets/{id}/assign`
Assign ticket to technician.

### Geofences

#### **GET** `/api/v1/geofences`
List geofence zones.

#### **POST** `/api/v1/geofences`
Create geofence boundary.

#### **POST** `/api/v1/geofences/check-vehicle`
Verify if vehicle is within authorized zone.

#### **GET** `/api/v1/geofences/{id}/logs`
Retrieve geofence violation logs.

### Users

#### **GET** `/api/v1/users`
List tenant users.

#### **POST** `/api/v1/users`
Create new user.

#### **PUT** `/api/v1/users/{id}`
Update user profile.

## Installation Guide

### Prerequisites

- Docker & Docker Compose
- PHP 8.2+ (for local development)
- Composer 2.x
- Node.js 18+ (for frontend assets)

### Setup with Docker

1. **Clone the repository:**
   ```bash
   git clone https://github.com/HybridSoftware-Blink/backend-blink-sprint4.git
   cd backend-blink-sprint4/Laravel_Sprint4_Equip3
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Configure environment:**
   ```bash
   cp .env.example .env
   ```

4. **Start Docker containers:**
   ```bash
   docker-compose up -d
   ```

5. **Generate application key:**
   ```bash
   docker-compose exec app php artisan key:generate
   ```

6. **Run database migrations:**
   ```bash
   docker-compose exec app php artisan migrate
   ```

7. **Seed initial data (optional):**
   ```bash
   docker-compose exec app php artisan db:seed
   ```

8. **Access the API:**
   - API Base URL: `http://localhost:8001`
   - Health Check: `http://localhost:8001/api/ping`
   - Database Check: `http://localhost:8001/db-check`

### Environment Configuration

Key environment variables in `.env`:

```env
APP_NAME=Blink
APP_ENV=local
APP_URL=http://localhost:8001

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=blink_sprint4_equip3
DB_USERNAME=root
DB_PASSWORD=password

CACHE_STORE=database
SESSION_DRIVER=database
```

## IoT Integration

### Raspberry Pi 5 Node Configuration

Blink integrates with **Raspberry Pi 5** devices installed in vehicles for real-time tracking:

**Hardware Setup:**
- Raspberry Pi 5 (4GB RAM)
- GPS Module (NEO-6M or equivalent)
- 4G/LTE Modem for connectivity
- CAN Bus interface for vehicle diagnostics

**Data Collection:**
- **GPS Tracking**: Location updates every 5 seconds
- **Battery Monitoring**: SOC (State of Charge) via CAN Bus
- **Speed & Acceleration**: IMU sensor fusion
- **Geofence Compliance**: Real-time boundary checking

**Communication Protocol:**
- HTTPS POST requests to `/api/v1/telemetry`
- JWT token-based authentication
- Payload compression (gzip)
- Retry logic with exponential backoff

**Sample Python Client:**
```python
import requests
import time

API_URL = "https://api.blink.com/api/v1/telemetry"
TOKEN = "your_api_token_here"

def send_telemetry(vehicle_id, lat, lon, battery, speed):
    payload = {
        "vehicle_id": vehicle_id,
        "timestamp": time.strftime("%Y-%m-%dT%H:%M:%SZ"),
        "location": {"latitude": lat, "longitude": lon},
        "battery_level": battery,
        "speed": speed
    }
    headers = {"Authorization": f"Bearer {TOKEN}"}
    response = requests.post(API_URL, json=payload, headers=headers)
    return response.json()
```

## Testing

### Run Test Suite

```bash
docker-compose exec app php artisan test
```

### Feature Tests
- Authentication flows
- Reservation lifecycle
- Geofence validation
- Ticket assignment

### Unit Tests
- Model relationships
- Business logic validation
- Data transformation

## Development Status

**Status:** 🟡 **Under Active Development**

### ✅ Completed Features

- [x] Multi-tenant user authentication (Laravel Sanctum)
- [x] RESTful API for vehicles, reservations, and tickets
- [x] MySQL database schema and migrations
- [x] Docker containerization
- [x] Geofence management system
- [x] Vehicle geofence logging
- [x] Session management
- [x] Database cache configuration
- [x] Basic IoT telemetry endpoint structure

### 🚧 In Progress

- [ ] MongoDB integration for telemetry storage
- [ ] Real-time WebSocket notifications
- [ ] Raspberry Pi client SDK
- [ ] Advanced analytics dashboard
- [ ] Automated fleet optimization algorithms

### 📋 Pending Tasks

- [ ] Rate limiting and API throttling
- [ ] Comprehensive API documentation (Swagger/OpenAPI)
- [ ] Integration with payment gateways
- [ ] Mobile app backend support
- [ ] Internationalization (i18n)
- [ ] Audit logging system
- [ ] Advanced reporting engine
- [ ] CI/CD pipeline configuration
- [ ] Load testing and performance optimization
- [ ] Security audit and penetration testing

## API Documentation

Full API documentation is available at:
- **Postman Collection**: [Coming Soon]
- **OpenAPI Spec**: [Coming Soon]

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Contributing

This is a private repository for the Blink development team. For contribution guidelines, please refer to the internal wiki.

## License

Proprietary - All rights reserved by HybridSoftware-Blink

## Support

For technical issues or questions:
- **Internal Wiki**: [Link to internal documentation]
- **Slack Channel**: #blink-backend
- **Email**: dev-team@blink.com

---

**Last Updated:** January 28, 2026  
**Version:** 1.0.0-alpha  
**Maintained by:** Backend Engineering Team
