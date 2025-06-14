import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Salon } from '../../services/dashboard.service';

@Component({
  selector: 'app-salones-grid',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="row g-4">
      <div class="col-md-6 col-lg-4" *ngFor="let salon of salones; trackBy: trackBySalonId">
        <div class="card aurora-card h-100 shadow-lg">
          <div class="card-img-top position-relative">
            <img [src]="salon.imagen || 'assets/images/salon-default.jpg'" 
                 class="card-img-top" 
                 style="height: 200px; object-fit: cover;"
                 [alt]="salon.nombre">
            <span class="position-absolute top-0 end-0 m-2" 
                  [ngClass]="getEstadoClase(salon)">
              {{ getEstadoTexto(salon) }}
            </span>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-white">{{ salon.nombre }}</h5>
            <p class="card-text text-light">{{ salon.descripcion }}</p>
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <small class="text-info">
                  <i class="bi bi-geo-alt me-1"></i>{{ salon.ubicacion }}
                </small>
                <small class="text-success">
                  <i class="bi bi-people me-1"></i>{{ salon.capacidad }} personas
                </small>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-warning fw-bold">
                  <i class="bi bi-currency-dollar"></i>{{ salon.precio }}
                </span>
                <button class="btn btn-success btn-sm" 
                        [disabled]="!salon.disponible"
                        (click)="onReservar(salon.id)">
                  <i class="bi bi-calendar-check me-1"></i>
                  {{ salon.disponible ? 'Reservar' : 'No disponible' }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `,
  styles: [`
    .aurora-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .aurora-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
  `]
})
export class SalonesGridComponent {
  @Input() salones: Salon[] = [];
  @Output() reservar = new EventEmitter<number>();

  trackBySalonId(index: number, salon: Salon): number {
    return salon.id;
  }

  getEstadoTexto(salon: Salon): string {
    return salon.disponible ? 'Disponible' : 'Ocupado';
  }

  getEstadoClase(salon: Salon): string {
    return salon.disponible ? 'badge bg-success' : 'badge bg-danger';
  }

  onReservar(id: number): void {
    this.reservar.emit(id);
  }
}

