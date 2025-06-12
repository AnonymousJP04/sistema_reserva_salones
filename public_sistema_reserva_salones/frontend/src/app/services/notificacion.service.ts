import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';

export interface Notificacion {
  id: number;
  titulo: string;
  mensaje: string;
  leida: boolean;
  created_at: Date;
}

@Injectable({
  providedIn: 'root'
})
export class NotificacionService {
  // Datos de ejemplo - en producción esto vendría de una API
  private notificaciones: Notificacion[] = [
    {
      id: 1,
      titulo: 'Reserva confirmada',
      mensaje: 'Su reserva para el salón 101 ha sido confirmada',
      leida: false,
      created_at: new Date()
    },
    {
      id: 2,
      titulo: 'Recordatorio',
      mensaje: 'Su reserva para mañana está próxima',
      leida: true,
      created_at: new Date(Date.now() - 86400000) // 1 día atrás
    }
  ];

  constructor() { }

  getNotificaciones(usuarioId: number): Observable<Notificacion[]> {
    // En producción, filtrar por usuarioId desde la API
    return of(this.notificaciones);
  }

  marcarLeida(notificacionId: number): Observable<void> {
    // Encontrar y marcar como leída
    const notificacion = this.notificaciones.find(n => n.id === notificacionId);
    if (notificacion) {
      notificacion.leida = true;
    }
    return of(undefined);
  }
}

