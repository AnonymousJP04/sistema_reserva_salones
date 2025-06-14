import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Salon {
  id: number;
  nombre: string;
  descripcion: string;
  ubicacion: string;
  tipo: string;
<<<<<<< HEAD
  precio: number;
  capacidad: number;
  disponible: boolean;
  imagen?: string;
  caracteristicas: string[];
  horarios: string[];
=======
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
>>>>>>> 2f5f380c0c8ebf0c4c913c7a06afaaa4ef391c36
}

@Injectable({
  providedIn: 'root'
})
export class DashboardService {
<<<<<<< HEAD
  private apiUrl = 'http://localhost:3000/api/salones'; // Ajusta esto si usas otra ruta
=======

  private apiUrl = 'http://localhost:3000/api/salones';
>>>>>>> 2f5f380c0c8ebf0c4c913c7a06afaaa4ef391c36

  constructor(private http: HttpClient) {}

  getSalones(): Observable<Salon[]> {
    return this.http.get<Salon[]>(this.apiUrl);
  }
}
