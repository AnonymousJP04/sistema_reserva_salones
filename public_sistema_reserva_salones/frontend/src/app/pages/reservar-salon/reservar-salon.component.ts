import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { SalonService } from '../../services/salon.service';

@Component({
  selector: 'app-reservar-salon',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './reservar-salon.component.html',
  styleUrls: ['./reservar-salon.component.css']
})
export class ReservarSalonComponent {
  salones: any[] = [];
  selectedSalonId!: number;
  selectedDate!: string;
  horaInicio!: string;
  horaFin!: string;
  numeroPersonas!: number;
  tipoEvento: string = '';
  observaciones: string = '';

  selectedFile: File | null = null;

  successMessage = '';
  errorMessage = '';

  constructor(private salonService: SalonService) {}

  onFileSelected(event: Event) {
    const input = event.target as HTMLInputElement;
    if (input.files && input.files.length > 0) {
      this.selectedFile = input.files[0];
      console.log('Archivo seleccionado:', this.selectedFile.name);
    }
  }

  reservarSalon() {
    this.successMessage = '';
    this.errorMessage = '';

    if (
      !this.selectedSalonId || !this.selectedDate || !this.horaInicio || 
      !this.horaFin || !this.numeroPersonas
    ) {
      this.errorMessage = 'Por favor completa todos los campos obligatorios.';
      return;
    }

    const formData = new FormData();
    formData.append('salon_id', this.selectedSalonId.toString());
    formData.append('fecha_reserva', this.selectedDate);
    formData.append('hora_inicio', this.horaInicio);
    formData.append('hora_fin', this.horaFin);
    formData.append('numero_personas', this.numeroPersonas.toString());
    formData.append('tipo_evento', this.tipoEvento);
    formData.append('observaciones', this.observaciones);

    if (this.selectedFile) {
      formData.append('comprobante', this.selectedFile);
    }

    this.salonService.reservarSalon(formData).subscribe({
      next: () => {
        this.successMessage = '¡Reserva realizada con éxito!';
        this.limpiarFormulario();
      },
      error: () => {
        this.errorMessage = 'Error al reservar el salón. Intenta nuevamente.';
      }
    });
  }

  limpiarFormulario() {
    this.selectedSalonId = 0 as any;
    this.selectedDate = '';
    this.horaInicio = '';
    this.horaFin = '';
    this.numeroPersonas = 0 as any;
    this.tipoEvento = '';
    this.observaciones = '';
    this.selectedFile = null;
  }
}
