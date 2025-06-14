import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Subject, takeUntil } from 'rxjs';
import { PerfilComponent } from '../perfil/perfil.component';
import { CalendarioComponent } from '../calendario/calendario.component';
import { DashboardService, Salon } from '../../services/dashboard.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  imports: [CommonModule, FormsModule, RouterModule, PerfilComponent, CalendarioComponent],
  standalone: true
})
export class DashboardComponent implements OnInit, OnDestroy {

  vistaActiva: 'dashboard' | 'perfil' = 'dashboard';
  vistaCalendario: boolean = false;

  salones: Salon[] = [];

  cargando: boolean = false;
  error: string | null = null;

  private destroy$ = new Subject<void>();

  constructor(private dashboardService: DashboardService) {}

  ngOnInit(): void {
    this.cargarSalones();
  }

  ngOnDestroy(): void {
    this.destroy$.next();
    this.destroy$.complete();
  }

  cargarSalones(): void {
    this.cargando = true;
    this.error = null;

    this.dashboardService.getSalones()
      .pipe(takeUntil(this.destroy$))
      .subscribe({
        next: (salones: Salon[]) => {
          this.salones = salones;
          this.cargando = false;
          console.log('Salones cargados:', salones.length);
        },
        error: (error: any) => {
          this.error = 'Error al cargar los salones.';
          this.cargando = false;
          console.error('Error al cargar salones:', error);
        }
      });
  }

  cambiarVista(vista: 'dashboard' | 'perfil'): void {
    this.vistaActiva = vista;
  }

  toggleCalendario(): void {
    this.vistaCalendario = !this.vistaCalendario;
  }

  trackBySalonId(index: number, salon: Salon): number {
    return salon.id;
  }
}
