import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Subject, takeUntil } from 'rxjs';
import { DashboardService, Salon } from '../../services/dashboard.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  standalone: true,
  imports: [CommonModule, FormsModule, RouterModule]
})
export class DashboardComponent implements OnInit, OnDestroy {

  vistaActiva: 'dashboard' | 'perfil' = 'dashboard';
  vistaCalendario: boolean = false;

  salones: Salon[] = [];
  salonesFiltrados: Salon[] = [];

  cargando: boolean = false;
  error: string | null = null;

  palabraClave: string = '';
  tipoSeleccionado: string = '';
  horarioSeleccionado: string = '';
  fechaSeleccionada: string = '';
  soloDisponibles: boolean = false;

  tiposSalon: string[] = [];
  horariosDisponibles: string[] = [];

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
          this.salonesFiltrados = salones;
          this.extraerFiltros(salones);
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

  aplicarFiltros(): void {
    this.salonesFiltrados = this.salones.filter(salon => {
      const coincidePalabra = this.palabraClave === '' || 
        salon.nombre.toLowerCase().includes(this.palabraClave.toLowerCase()) ||
        salon.descripcion.toLowerCase().includes(this.palabraClave.toLowerCase()) ||
        salon.ubicacion.toLowerCase().includes(this.palabraClave.toLowerCase());

      const coincideTipo = this.tipoSeleccionado === '' || salon.tipo === this.tipoSeleccionado;
      const coincideHorario = this.horarioSeleccionado === '' || salon.horarios.includes(this.horarioSeleccionado);
      const coincideFecha = this.fechaSeleccionada === '' || salon.disponible; // Simplified for now - can be enhanced later
      const disponible = !this.soloDisponibles || salon.disponible;

      return coincidePalabra && coincideTipo && coincideHorario && coincideFecha && disponible;
    });
  }

  limpiarFiltros(): void {
    this.palabraClave = '';
    this.tipoSeleccionado = '';
    this.horarioSeleccionado = '';
    this.fechaSeleccionada = '';
    this.soloDisponibles = false;
    this.salonesFiltrados = [...this.salones];
  }

  extraerFiltros(salones: Salon[]): void {
    const tipos = new Set<string>();
    const horarios = new Set<string>();

    salones.forEach(salon => {
      if (salon.tipo) tipos.add(salon.tipo);
      salon.horarios?.forEach(h => horarios.add(h));
    });

    this.tiposSalon = Array.from(tipos);
    this.horariosDisponibles = Array.from(horarios);
  }

  getEstadoTexto(salon: Salon): string {
    return salon.disponible ? 'Disponible' : 'Ocupado';
  }

  getEstadoClase(salon: Salon): string {
    return salon.disponible ? 'badge bg-success' : 'badge bg-danger';
  }

  verDetalles(id: number): void {
    console.log('Ver detalles del salón:', id);
  }

  reservarSalon(id: number): void {
    console.log('Reservar salón:', id);
  }
}
