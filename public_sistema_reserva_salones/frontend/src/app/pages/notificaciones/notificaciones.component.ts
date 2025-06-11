import { Component, OnInit } from '@angular/core';
import { NotificacionService } from '../../services/notificacion.service';

@Component({
  selector: 'app-notificaciones',
  templateUrl: './notificaciones.component.html',
  styleUrls: ['./notificaciones.component.css']
})
export class NotificacionesComponent implements OnInit {
  notificaciones: any[] = [];
  usuarioId: number = 0; // Aquí debes obtener el id del usuario logueado

  constructor(private notificacionService: NotificacionService) {}

  ngOnInit() {
    this.usuarioId = /* obtener usuarioId de sesión o JWT */;
    this.cargarNotificaciones();
  }

  cargarNotificaciones() {
    this.notificacionService.getNotificaciones(this.usuarioId).subscribe({
      next: data => this.notificaciones = data,
      error: err => console.error('Error cargando notificaciones', err)
    });
  }

  marcarLeida(notificacionId: number) {
    this.notificacionService.marcarLeida(notificacionId).subscribe(() => {
      this.cargarNotificaciones(); // Actualiza lista tras marcar leída
    });
  }
}
