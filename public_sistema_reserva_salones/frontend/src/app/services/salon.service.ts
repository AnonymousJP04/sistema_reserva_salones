import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SalonService {
  private readonly apiUrl = 'http://localhost:3000/api';

  constructor(private readonly http: HttpClient) {}

  // Obtener todos los salones (para llenar selector)
  getSalones(): Observable<any[]> {
    return this.http.get<any[]>(`${this.apiUrl}/salones`);
  }

  getHistorialReservas(): Observable<any[]> {
  const token = localStorage.getItem('token');
  const headers = new HttpHeaders({
    Authorization: `Bearer ${token}`
  });

  return this.http.get<any[]>(`${this.apiUrl}/reservas/historial`, { headers });
}

  // Reservar salón enviando un objeto reserva
 reservarSalon(formData: FormData): Observable<any> {
  return this.http.post(`${this.apiUrl}/reservas`, formData);
}
}
