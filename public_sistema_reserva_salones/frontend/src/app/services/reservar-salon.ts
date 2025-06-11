import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SalonService {
  private readonly apiUrl = 'http://localhost:3000/api';

  constructor(private readonly http: HttpClient) {}

  /**
   * Obtener salones disponibles en una fecha específica
   * @param fecha string con formato 'YYYY-MM-DD'
   */
  getSalonesDisponibles(fecha: string): Observable<any[]> {
    return this.http.get<any[]>(${this.apiUrl}/salones/disponibles?fecha=${fecha});
  }

  /**
   * Reservar un salón para un horario específico
   * @param horarioId ID del horario seleccionado
   * @param salonId ID del salón seleccionado
   */
  reservarSalon(horarioId: number, salonId: number): Observable<any> {
    return this.http.post(${this.apiUrl}/reservas, {
      horario_id: horarioId,
      salon_id: salonId
    });
  }

  // (Opcional) Si necesitas token JWT para reservar:
  /*
  reservarSalon(horarioId: number, salonId: number): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = new HttpHeaders({
      'Authorization': Bearer ${token}
    });

    return this.http.post(${this.apiUrl}/reservas, {
      horario_id: horarioId,
      salon_id: salonId
    }, { headers });
  }
  */
}