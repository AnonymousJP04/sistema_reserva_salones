import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { map, catchError } from 'rxjs/operators';

// Interfaces y tipos
export interface Salon {
  id: number;
  nombre: string;
  descripcion: string;
  ubicacion: string;
  capacidad: number;
  tipo: string;
  disponible: boolean;
  imagen?: string;
  caracteristicas: string[];
  horarios: string[];
  fechasDisponibles: string[];
  precioPorHora?: number;
  equipamiento?: string[];
}

export interface FiltrosSalon {
  palabraClave?: string;
  tipo?: string;
  horario?: string;
  fecha?: string;
  soloDisponibles?: boolean;
  capacidadMinima?: number;
}

export interface ReservaSalon {
  salonId: number;
  fecha: string;
  horario: string;
  motivo: string;
  participantes: number;
  usuarioId?: number;
}

@Injectable({
  providedIn: 'root'
})
export class SalonesService {
  private readonly apiUrl = 'http://localhost:3000/api';

  constructor(private readonly http: HttpClient) {}

  /**
   * Obtener todos los salones
   */
  obtenerSalones(): Observable<Salon[]> {
    return this.http.get<Salon[]>(`${this.apiUrl}/salones`)
      .pipe(
        catchError((error) => {
          console.error('Error al obtener salones:', error);
          // Retornar datos de ejemplo en caso de error
          return of(this.getSalonesEjemplo());
        })
      );
  }

  /**
   * Obtener salones con filtros aplicados
   */
  obtenerSalonesFiltrados(filtros: FiltrosSalon): Observable<Salon[]> {
    const params = new URLSearchParams();
    
    if (filtros.palabraClave) params.append('busqueda', filtros.palabraClave);
    if (filtros.tipo) params.append('tipo', filtros.tipo);
    if (filtros.horario) params.append('horario', filtros.horario);
    if (filtros.fecha) params.append('fecha', filtros.fecha);
    if (filtros.soloDisponibles) params.append('disponible', 'true');
    if (filtros.capacidadMinima) params.append('capacidad', filtros.capacidadMinima.toString());

    const url = `${this.apiUrl}/salones?${params.toString()}`;
    
    return this.http.get<Salon[]>(url)
      .pipe(
        catchError((error) => {
          console.error('Error al filtrar salones:', error);
          // En caso de error, aplicar filtros localmente
          return this.obtenerSalones().pipe(
            map(salones => this.aplicarFiltrosLocales(salones, filtros))
          );
        })
      );
  }

  /**
   * Obtener tipos de salón disponibles
   */
  obtenerTiposSalon(): Observable<string[]> {
    return this.http.get<string[]>(`${this.apiUrl}/salones/tipos`)
      .pipe(
        catchError((error) => {
          console.error('Error al obtener tipos:', error);
          return of(['Conferencias', 'Eventos', 'Reuniones', 'Capacitación', 'Auditorio', 'Aula']);
        })
      );
  }

  /**
   * Obtener horarios disponibles
   */
  obtenerHorariosDisponibles(): Observable<string[]> {
    return this.http.get<string[]>(`${this.apiUrl}/salones/horarios`)
      .pipe(
        catchError((error) => {
          console.error('Error al obtener horarios:', error);
          return of([
            '07:00-12:00', '08:00-12:00', '08:00-17:00', 
            '09:00-13:00', '13:00-18:00', '14:00-18:00', 
            '15:00-19:00', '18:00-22:00'
          ]);
        })
      );
  }

  /**
   * Verificar disponibilidad de un salón
   */
  verificarDisponibilidad(salonId: number, fecha: string, horario: string): Observable<boolean> {
    const params = { fecha, horario };
    return this.http.get<{disponible: boolean}>(`${this.apiUrl}/salones/${salonId}/disponibilidad`, { params })
      .pipe(
        map(response => response.disponible),
        catchError((error) => {
          console.error('Error al verificar disponibilidad:', error);
          return of(true); // Asumir disponible en caso de error
        })
      );
  }

  /**
   * Realizar reserva de salón
   */
  reservarSalon(reserva: ReservaSalon): Observable<any> {
    const token = localStorage.getItem('token');
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json'
    });

    return this.http.post(`${this.apiUrl}/reservas`, reserva, { headers })
      .pipe(
        catchError((error) => {
          console.error('Error al reservar salón:', error);
          throw error;
        })
      );
  }

  /**
   * Obtener detalles de un salón específico
   */
  obtenerDetallesSalon(salonId: number): Observable<Salon> {
    return this.http.get<Salon>(`${this.apiUrl}/salones/${salonId}`)
      .pipe(
        catchError((error) => {
          console.error('Error al obtener detalles del salón:', error);
          throw error;
        })
      );
  }

  /**
   * Aplicar filtros localmente (fallback)
   */
  private aplicarFiltrosLocales(salones: Salon[], filtros: FiltrosSalon): Salon[] {
    return salones.filter(salon => {
      if (filtros.palabraClave) {
        const busqueda = filtros.palabraClave.toLowerCase();
        const coincide = salon.nombre.toLowerCase().includes(busqueda) ||
                        salon.descripcion.toLowerCase().includes(busqueda) ||
                        salon.ubicacion.toLowerCase().includes(busqueda) ||
                        salon.caracteristicas.some(c => c.toLowerCase().includes(busqueda));
        if (!coincide) return false;
      }

      if (filtros.tipo && salon.tipo !== filtros.tipo) return false;
      if (filtros.horario && !salon.horarios.includes(filtros.horario)) return false;
      if (filtros.fecha && !salon.fechasDisponibles.includes(filtros.fecha)) return false;
      if (filtros.soloDisponibles && !salon.disponible) return false;
      if (filtros.capacidadMinima && salon.capacidad < filtros.capacidadMinima) return false;

      return true;
    });
  }

  /**
   * Datos de ejemplo para desarrollo/testing
   */
  private getSalonesEjemplo(): Salon[] {
    return [
      {
        id: 1,
        nombre: 'Salón Ejecutivo A',
        descripcion: 'Salón ideal para reuniones ejecutivas y presentaciones importantes',
        ubicacion: 'Edificio Principal, Piso 3',
        capacidad: 12,
        tipo: 'Reuniones',
        disponible: true,
        imagen: 'assets/salon-ejecutivo-a.jpg',
        caracteristicas: ['Proyector', 'Sistema de audio', 'WiFi', 'Aire acondicionado', 'Mesa de conferencias'],
        horarios: ['08:00-12:00', '13:00-18:00'],
        fechasDisponibles: ['2025-06-15', '2025-06-16', '2025-06-17'],
        precioPorHora: 50,
        equipamiento: ['Proyector HD', 'Sistema de videoconferencia', 'Pizarra inteligente']
      },
      {
        id: 2,
        nombre: 'Auditorio Central',
        descripcion: 'Amplio auditorio para eventos, conferencias y presentaciones masivas',
        ubicacion: 'Edificio Central, Planta Baja',
        capacidad: 150,
        tipo: 'Auditorio',
        disponible: true,
        imagen: 'assets/auditorio-central.jpg',
        caracteristicas: ['Escenario', 'Sistema de sonido profesional', 'Iluminación especializada', 'Butacas fijas'],
        horarios: ['09:00-13:00', '14:00-18:00', '18:00-22:00'],
        fechasDisponibles: ['2025-06-15', '2025-06-18', '2025-06-19'],
        precioPorHora: 200,
        equipamiento: ['Sistema de sonido 5.1', 'Proyectores duales', 'Cámaras de transmisión']
      },
      {
        id: 3,
        nombre: 'Aula de Capacitación B',
        descripcion: 'Aula moderna equipada para sesiones de capacitación y talleres',
        ubicacion: 'Edificio Académico, Piso 2',
        capacidad: 30,
        tipo: 'Capacitación',
        disponible: false,
        imagen: 'assets/aula-capacitacion-b.jpg',
        caracteristicas: ['Mesas modulares', 'Pizarra digital', 'WiFi de alta velocidad', 'Enchufes individuales'],
        horarios: ['07:00-12:00', '13:00-18:00'],
        fechasDisponibles: ['2025-06-20', '2025-06-21'],
        precioPorHora: 75,
        equipamiento: ['Tablets para estudiantes', 'Simuladores', 'Software especializado']
      }
    ];
  }
}

