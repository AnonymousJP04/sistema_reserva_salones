import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';

import { FullCalendarModule } from '@fullcalendar/angular';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

@Component({
  selector: 'app-calendario',
  standalone: true,
  imports: [CommonModule, HttpClientModule, FullCalendarModule],
  templateUrl: './calendario.component.html',
  styleUrls: ['./calendario.component.css']
})
export class CalendarioComponent implements OnInit {

  calendarPlugins = [dayGridPlugin, timeGridPlugin, interactionPlugin];
  events: any[] = [];

  constructor(private http: HttpClient) {}

  ngOnInit(): void {
    this.http.get<any[]>('http://localhost:3000/api/reservas').subscribe(data => {
      this.events = data.map(reserva => ({
        title: `${reserva.nombre_salon} - ${reserva.nombre_usuario} ${reserva.apellido_usuario}`,
        start: `${reserva.fecha_reserva}T${reserva.hora_inicio}`,
        end: `${reserva.fecha_reserva}T${reserva.hora_fin}`,
        color: this.getColorByEstado(reserva.estado)
      }));
    });
  }

  getColorByEstado(estado: string): string {
    switch (estado) {
      case 'aprobada': return 'green';
      case 'pendiente': return 'orange';
      case 'rechazada': return 'red';
      case 'completada': return 'blue';
      default: return 'gray';
    }
  }
}
