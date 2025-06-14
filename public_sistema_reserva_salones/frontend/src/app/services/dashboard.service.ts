import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Salon {
  id: number;
  nombre: string;
  descripcion: string;
  ubicacion: string;
  tipo: string;
  estado: string;
  precio_base: number;
  capacidad_minima: number;
  capacidad_maxima: number;
  area_metros: number;
  imagen_principal?: string;
  galeria_imagenes_array?: string[]; 
  caracteristicas: string[];
  horarios: string[];
  fechasDisponibles: string[];
  disponible: boolean;
}

@Injectable({
  providedIn: 'root'
})
export class DashboardService {

  private apiUrl = 'http://localhost:3000/api/salones';

  constructor(private http: HttpClient) {}

  getSalones(): Observable<Salon[]> {
    return this.http.get<Salon[]>(this.apiUrl);
  }
}
