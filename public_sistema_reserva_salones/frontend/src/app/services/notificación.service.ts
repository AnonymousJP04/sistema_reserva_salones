import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class NotificacionService {
  private apiUrl = 'http://localhost:3000/api/notificaciones'; // URL base API

  constructor(private http: HttpClient) {}

  getNotificaciones(usuarioId: number): Observable<any[]> {
    return this.http.get<any[]>(`${this.apiUrl}/usuario/${usuarioId}`);
  }

  marcarLeida(id: number): Observable<any> {
    return this.http.put(`${this.apiUrl}/${id}/leida`, {});
  }
}
