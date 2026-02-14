# 📋 API de Reserves - Documentació

## 🔐 Autenticació
Tots els endpoints requereixen autenticació amb Sanctum (Bearer Token).

```
Authorization: Bearer {token}
```

---

## 📍 Endpoints Disponibles

### 1. **Crear Reserva**
```http
POST /api/v1/reservations
```

**Body:**
```json
{
  "vehicle_id": 1,
  "start_date": "2026-02-15 10:00:00",
  "end_date": "2026-02-15 14:00:00",
  "pickup_location": "Barcelona, Plaça Catalunya",
  "dropoff_location": "Barcelona, Sagrada Família"
}
```

**Resposta:**
```json
{
  "reservation_id": 1,
  "user_id": 5,
  "vehicle_id": 1,
  "start_date": "2026-02-15T10:00:00.000000Z",
  "end_date": "2026-02-15T14:00:00.000000Z",
  "status": "pending",
  "total_cost": "40.00",
  "vehicle": {
    "vehicle_id": 1,
    "license_plate": "1234ABC",
    "brand": "Tesla",
    "model": "Model 3"
  }
}
```

**Notes:**
- El cost es calcula automàticament (€10/hora)
- Verifica disponibilitat del vehicle
- Retorna error 422 si el vehicle no està disponible

---

### 2. **Les Meves Reserves**
```http
GET /api/v1/my-reservations
```

**Resposta:**
```json
[
  {
    "reservation_id": 1,
    "vehicle_id": 1,
    "start_date": "2026-02-15T10:00:00.000000Z",
    "end_date": "2026-02-15T14:00:00.000000Z",
    "status": "active",
    "total_cost": "40.00",
    "vehicle": {
      "license_plate": "1234ABC",
      "brand": "Tesla",
      "model": "Model 3"
    }
  }
]
```

---

### 3. **Vehicles Disponibles**
```http
GET /api/v1/vehicles/available/search?start_date=2026-02-15&end_date=2026-02-20
```

**Query Parameters:**
- `start_date` (required): Data inici (YYYY-MM-DD o YYYY-MM-DD HH:MM:SS)
- `end_date` (required): Data final (YYYY-MM-DD o YYYY-MM-DD HH:MM:SS)

**Resposta:**
```json
{
  "available_vehicles": [
    {
      "vehicle_id": 1,
      "license_plate": "1234ABC",
      "brand": "Tesla",
      "model": "Model 3",
      "status": "available",
      "current_latitude": 41.3874,
      "current_longitude": 2.1686
    }
  ],
  "count": 1,
  "date_range": {
    "start": "2026-02-15",
    "end": "2026-02-20"
  }
}
```

---

### 4. **Generar QR per Desbloquejar**
```http
GET /api/v1/reservations/{id}/qr
```

**Resposta:**
```json
{
  "qr_code": "PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMDAgMzAwIj4...",
  "format": "svg",
  "expires_at": "2026-02-15 16:00:00",
  "reservation": {
    "reservation_id": 1,
    "vehicle": {
      "license_plate": "1234ABC"
    }
  }
}
```

**Notes:**
- El QR està en format SVG (base64 encoded)
- Expira en 2 hores
- Només funciona per reserves amb status "active"
- Dades encriptades amb informació de la reserva

---

### 5. **Verificar QR i Desbloquejar**
```http
POST /api/v1/reservations/verify-qr
```

**Body:**
```json
{
  "qr_data": "encrypted_qr_string_here"
}
```

**Resposta Exitosa:**
```json
{
  "message": "Vehicle desbloquejat correctament",
  "vehicle_id": 1,
  "reservation": {
    "reservation_id": 1,
    "status": "active"
  }
}
```

**Errors:**
- 422: QR code expirat
- 422: Reserva no vàlida
- 422: QR code invàlid

---

### 6. **Calendari de Reserves d'un Vehicle**
```http
GET /api/v1/vehicles/{id}/calendar?month=2&year=2026
```

**Query Parameters:**
- `month` (optional): Mes (1-12), per defecte: mes actual
- `year` (optional): Any (YYYY), per defecte: any actual

**Resposta:**
```json
{
  "vehicle": {
    "vehicle_id": 1,
    "license_plate": "1234ABC"
  },
  "month": 2,
  "year": 2026,
  "reservations": [
    {
      "reservation_id": 1,
      "start_date": "2026-02-15T10:00:00.000000Z",
      "end_date": "2026-02-15T14:00:00.000000Z",
      "status": "active",
      "user": {
        "user_id": 5,
        "name": "Joan Garcia",
        "email": "joan@example.com"
      }
    }
  ]
}
```

---

### 7. **Actualitzar Estat de Reserva**
```http
PATCH /api/v1/reservations/{id}/status
```

**Body:**
```json
{
  "status": "active"
}
```

**Estats possibles:**
- `pending`: Pendent de confirmació
- `active`: Activa (en curs)
- `completed`: Completada
- `cancelled`: Cancel·lada

---

### 8. **Llistar Totes les Reserves**
```http
GET /api/v1/reservations
```

---

### 9. **Veure Detall d'una Reserva**
```http
GET /api/v1/reservations/{id}
```

---

### 10. **Actualitzar Reserva**
```http
PUT /api/v1/reservations/{id}
```

**Body:**
```json
{
  "start_date": "2026-02-16 10:00:00",
  "end_date": "2026-02-16 14:00:00"
}
```

---

### 11. **Eliminar Reserva**
```http
DELETE /api/v1/reservations/{id}
```

---

## 🧪 Exemples amb cURL

### Crear una reserva:
```bash
curl -X POST http://localhost:8001/api/v1/reservations \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "vehicle_id": 1,
    "start_date": "2026-02-15 10:00:00",
    "end_date": "2026-02-15 14:00:00"
  }'
```

### Obtenir vehicles disponibles:
```bash
curl -X GET "http://localhost:8001/api/v1/vehicles/available/search?start_date=2026-02-15&end_date=2026-02-20" \
  -H "Authorization: Bearer YOUR_TOKEN"
```

### Generar QR:
```bash
curl -X GET http://localhost:8001/api/v1/reservations/1/qr \
  -H "Authorization: Bearer YOUR_TOKEN"
```

---

## 🔒 Seguretat del QR Code

El QR code conté dades encriptades amb els següents camps:
- `reservation_id`: ID de la reserva
- `vehicle_id`: ID del vehicle
- `user_id`: ID de l'usuari
- `expires_at`: Data d'expiració (2h des de la generació)
- `token`: Token aleatori únic

Les dades s'encripten amb `Crypt::encryptString()` de Laravel.

---

## ⚡ Flux d'ús recomanat

1. **Usuari cerca vehicle disponible:**
   ```
   GET /api/v1/vehicles/available/search?start_date=...&end_date=...
   ```

2. **Usuari crea la reserva:**
   ```
   POST /api/v1/reservations
   ```

3. **Admin activa la reserva:**
   ```
   PATCH /api/v1/reservations/{id}/status
   Body: { "status": "active" }
   ```

4. **Usuari genera QR per desbloquejar:**
   ```
   GET /api/v1/reservations/{id}/qr
   ```

5. **Sistema verifica QR i desbloqueja vehicle:**
   ```
   POST /api/v1/reservations/verify-qr
   ```

---

## 📊 Còdis d'estat HTTP

- `200`: Èxit
- `201`: Reserva creada
- `403`: No autoritzat
- `404`: Reserva/Vehicle no trobat
- `422`: Validació fallida o vehicle no disponible

---

## 🎯 Validacions Implementades

✅ **Dates:**
- Data inici posterior a ara
- Data final posterior a data inici

✅ **Disponibilitat:**
- Comprova reserves solapades
- Només vehicles amb status "available"

✅ **QR Code:**
- Només per reserves actives
- Verificació d'expiració
- Dades encriptades

✅ **Autorització:**
- Usuari només pot veure les seves reserves
- Usuari només pot generar QR de les seves reserves
