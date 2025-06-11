import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http'; // ✅ Aquí está la corrección
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SalonService {
  private readonly apiUrl = 'http://localhost:3000/api';

  constructor(private readonly http: HttpClient) {}

  getHistorialReservas(): Observable<any[]> {
    const token = localStorage.getItem('token');
    const headers = new HttpHeaders({
      Authorization: `Bearer ${token}`
    });

    return this.http.get<any[]>(`${this.apiUrl}/reservas/historial`, { headers });
  }
}
