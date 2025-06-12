import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DatePipe } from '@angular/common';
import { SalonService } from '../../services/salon.service';

interface Reserva {
  id: number;
  salonId: number;
  salonNombre: string;
  fecha: string;
  horaInicio: string;
  horaFin: string;
  motivo: string;
  estado: string;
  created_at: string;
}

@Component({
  selector: 'app-mis-reservas',
  standalone: true,
  imports: [CommonModule, DatePipe],
  template: `
    <div class="container mt-4">
      <h2 class="mb-4">
        <i class="bi bi-calendar-check me-2"></i>
        Mis Reservas
      </h2>
      
      <div *ngIf="cargando" class="text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>
      
      <div *ngIf="!cargando && reservas.length === 0" class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i>
        No tienes reservas registradas.
      </div>
      
      <div class="row">
        <div class="col-md-12" *ngFor="let reserva of reservas">
          <div class="card mb-3 shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="card-title">{{ reserva.salonNombre }}</h5>
                  <p class="card-text">{{ reserva.motivo }}</p>
                  <p class="text-muted mb-0">
                    <i class="bi bi-calendar me-1"></i>{{ reserva.fecha | date:'shortDate' }}
                    <i class="bi bi-clock ms-2 me-1"></i>{{ reserva.horaInicio }} - {{ reserva.horaFin }}
                  </p>
                </div>
                <span [ngClass]="getEstadoClase(reserva.estado)">
                  {{ reserva.estado }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `,
  styles: [`
    .badge {
      padding: 8px 12px;
      border-radius: 4px;
      font-weight: 500;
    }
    .badge-pendiente {
      background-color: #ffc107;
      color: #212529;
    }
    .badge-confirmada {
      background-color: #28a745;
      color: white;
    }
    .badge-cancelada {
      background-color: #dc3545;
      color: white;
    }
  `]
})
export class MisReservasComponent implements OnInit {
  reservas: Reserva[] = [];
  cargando: boolean = true;

  constructor(private salonService: SalonService) {}

  ngOnInit(): void {
    this.cargarReservas();
  }

  cargarReservas(): void {
    this.cargando = true;
    this.salonService.getHistorialReservas().subscribe({
      next: (data) => {
        this.reservas = data;
        this.cargando = false;
      },
      error: (error) => {
        console.error('Error cargando reservas:', error);
        this.cargando = false;
      }
    });
  }

  getEstadoClase(estado: string): string {
    switch(estado.toLowerCase()) {
      case 'pendiente': return 'badge badge-pendiente';
      case 'confirmada': return 'badge badge-confirmada';
      case 'cancelada': return 'badge badge-cancelada';
      default: return 'badge bg-secondary';
    }
  }
}
