import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

export interface Salon {
  id: number;
  nombre: string;
  tipo: string;
  capacidad: number;
  ubicacion: string;
  descripcion: string;
  precio: number;
  disponible: boolean;
  horarios: string[];
  fechasDisponibles: string[];
  imagen: string;
  caracteristicas: string[];
}

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  imports: [CommonModule, FormsModule],
  standalone: true
})
export class DashboardComponent implements OnInit {
  
  // Array de salones (vacío - será llenado desde la BD)
  salones: Salon[] = [];

  // Variables para filtros
  salonesTotales: Salon[] = [];
  salonesFiltrados: Salon[] = [];

  vistaCalendario: boolean = false;
  
  // Controles de filtros
  palabraClave: string = '';
  tipoSeleccionado: string = '';
  horarioSeleccionado: string = '';
  fechaSeleccionada: string = '';
  soloDisponibles: boolean = false;
  
  // Opciones para filtros
  tiposSalon: string[] = ['Conferencias', 'Eventos', 'Reuniones', 'Capacitación'];
  horariosDisponibles: string[] = [
    '07:00-12:00', '08:00-12:00', '08:00-17:00', 
    '09:00-13:00', '13:00-18:00', '14:00-18:00', '15:00-19:00'
  ];

  constructor() { }

  ngOnInit(): void {
    this.cargarSalones();
  }

  // Cargar salones desde la base de datos
  cargarSalones(): void {
    // TODO: Aquí irá la llamada al servicio para obtener salones de la BD
    // Ejemplo: this.salonService.getSalones().subscribe(...)
    console.log('Cargando salones desde la base de datos...');
    this.aplicarFiltros();
  }

  // Método principal para aplicar todos los filtros
  aplicarFiltros(): void {
    this.salonesFiltrados = this.salonesTotales.filter(salon => {
      return this.filtrarPorPalabraClave(salon) &&
             this.filtrarPorTipo(salon) &&
             this.filtrarPorHorario(salon) &&
             this.filtrarPorFecha(salon) &&
             this.filtrarPorDisponibilidad(salon);
    });
  }

  // Filtro por palabra clave
  filtrarPorPalabraClave(salon: Salon): boolean {
    if (!this.palabraClave) return true;
    
    const palabraBusqueda = this.palabraClave.toLowerCase();
    return salon.nombre.toLowerCase().includes(palabraBusqueda) ||
           salon.descripcion.toLowerCase().includes(palabraBusqueda) ||
           salon.ubicacion.toLowerCase().includes(palabraBusqueda) ||
           salon.caracteristicas.some(c => c.toLowerCase().includes(palabraBusqueda));
  }

  // Filtro por tipo de salón
  filtrarPorTipo(salon: Salon): boolean {
    if (!this.tipoSeleccionado) return true;
    return salon.tipo === this.tipoSeleccionado;
  }

  // Filtro por horario
  filtrarPorHorario(salon: Salon): boolean {
    if (!this.horarioSeleccionado) return true;
    return salon.horarios.includes(this.horarioSeleccionado);
  }

  // Filtro por fecha
  filtrarPorFecha(salon: Salon): boolean {
    if (!this.fechaSeleccionada) return true;
    return salon.fechasDisponibles.includes(this.fechaSeleccionada);
  }

  // Filtro por disponibilidad
  filtrarPorDisponibilidad(salon: Salon): boolean {
    if (!this.soloDisponibles) return true;
    return salon.disponible;
  }

  // Limpiar todos los filtros
  limpiarFiltros(): void {
    this.palabraClave = '';
    this.tipoSeleccionado = '';
    this.horarioSeleccionado = '';
    this.fechaSeleccionada = '';
    this.soloDisponibles = false;
    this.aplicarFiltros();
  }

  // Acciones para los salones
  verDetalles(salonId: number): void {
    console.log('Ver detalles del salón:', salonId);
    // TODO: Implementar navegación o modal
  }

  reservarSalon(salonId: number): void {
    console.log('Reservar salón:', salonId);
    // TODO: Implementar lógica de reserva
  }

  // Obtener clase CSS para el estado del salón
  getEstadoClase(salon: Salon): string {
    return salon.disponible ? 'badge bg-success' : 'badge bg-danger';
  }

  getEstadoTexto(salon: Salon): string {
    return salon.disponible ? 'Disponible' : 'Ocupado';
  }
}