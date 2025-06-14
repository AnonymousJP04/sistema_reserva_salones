import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Salon {
  id: number;
  nombre: string;
  descripcion: string;
  ubicacion: string;
  tipo: string;
  precio: number;
  capacidad: number;
  disponible: boolean;
  imagen?: string;
  caracteristicas: string[];
  horarios: string[];
}

@Injectable({
  providedIn: 'root'
})
export class DashboardService {
  private apiUrl = 'http://localhost:3000/api/salones'; // Ajusta esto si usas otra ruta

  constructor(private http: HttpClient) {}

  getSalones(): Observable<Salon[]> {
    return this.http.get<Salon[]>(this.apiUrl);
  }
}
