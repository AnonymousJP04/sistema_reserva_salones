import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Subject, takeUntil } from 'rxjs';

export interface Usuario {
  id?: number;
  nombre: string;
  email: string;
  telefono?: string;
  departamento?: string;
  cargo?: string;
  fechaIngreso?: string;
  biografia?: string;
  avatar?: string;
  fechaCreacion?: string;
}

export interface EstadisticasUsuario {
  totalReservas: number;
  reservasPendientes: number;
  salonFavorito: string;
  ultimaReserva: string;
}

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css'],
  imports: [CommonModule, FormsModule, RouterModule],
  standalone: true
})
export class PerfilComponent implements OnInit, OnDestroy {
  
  // Estado del componente
  usuario: Usuario = {
    nombre: '',
    email: '',
    telefono: '',
    departamento: '',
    cargo: '',
    fechaIngreso: '',
    biografia: '',
    avatar: ''
  };

  usuarioOriginal: Usuario = {
    nombre: '',
    email: ''
  }; // Para cancelar cambios
  estadisticas: EstadisticasUsuario | null = null;
  
  // Estados de UI
  modoEdicion: boolean = false;
  cargando: boolean = false;
  guardando: boolean = false;
  error: string | null = null;
  mensajeExito: string | null = null;
  
  // Para cambio de foto
  archivoSeleccionado: File | null = null;
  vistaPrevia: string | null = null;
  
  private destroy$ = new Subject<void>();

  constructor(
    // private usuarioService: UsuarioService // Inyectar cuando tengas el servicio
  ) {}

  ngOnInit(): void {
    this.cargarPerfil();
    this.cargarEstadisticas();
  }

  ngOnDestroy(): void {
    this.destroy$.next();
    this.destroy$.complete();
  }

  /**
   * Cargar datos del perfil del usuario
   */
  cargarPerfil(): void {
    this.cargando = true;
    this.error = null;

    // TODO: Reemplazar con llamada real al servicio
    // this.usuarioService.obtenerPerfilActual()
    //   .pipe(takeUntil(this.destroy$))
    //   .subscribe({
    //     next: (usuario) => {
    //       this.usuario = { ...usuario };
    //       this.usuarioOriginal = { ...usuario };
    //       this.cargando = false;
    //     },
    //     error: (error) => {
    //       this.error = 'Error al cargar el perfil. Por favor, intenta de nuevo.';
    //       this.cargando = false;
    //       console.error('Error al cargar perfil:', error);
    //     }
    //   });

    // Datos de ejemplo mientras implementas el servicio
    setTimeout(() => {
      this.usuario = {
        id: 1,
        nombre: 'Juan Carlos Pérez',
        email: 'juan.perez@empresa.com',
        telefono: '+502 1234-5678',
        departamento: 'Tecnología',
        cargo: 'Desarrollador Senior',
        fechaIngreso: '2023-01-15',
        biografia: 'Desarrollador con más de 5 años de experiencia en aplicaciones web.',
        avatar: 'assets/avatars/user1.jpg',
        fechaCreacion: '2023-01-15T00:00:00Z'
      };
      this.usuarioOriginal = { ...this.usuario };
      this.cargando = false;
    }, 1000);
  }

  /**
   * Cargar estadísticas del usuario
   */
  cargarEstadisticas(): void {
    // TODO: Implementar llamada al servicio
    // this.usuarioService.obtenerEstadisticas()
    //   .pipe(takeUntil(this.destroy$))
    //   .subscribe({
    //     next: (stats) => this.estadisticas = stats,
    //     error: (error) => console.error('Error al cargar estadísticas:', error)
    //   });

    // Datos de ejemplo
    setTimeout(() => {
      this.estadisticas = {
        totalReservas: 15,
        reservasPendientes: 2,
        salonFavorito: 'Sala A',
        ultimaReserva: '2024-12-15'
      };
    }, 1500);
  }

  /**
   * Alternar entre modo vista y edición
   */
  toggleModoEdicion(): void {
    if (this.modoEdicion) {
      // Si está en modo edición, guardar
      this.guardarPerfil();
    } else {
      // Si está en modo vista, cambiar a edición
      this.modoEdicion = true;
      this.limpiarMensajes();
    }
  }

  /**
   * Guardar cambios del perfil
   */
  guardarPerfil(): void {
    if (!this.validarFormulario()) {
      return;
    }

    this.guardando = true;
    this.error = null;
    this.mensajeExito = null;

    // TODO: Implementar llamada al servicio
    // this.usuarioService.actualizarPerfil(this.usuario)
    //   .pipe(takeUntil(this.destroy$))
    //   .subscribe({
    //     next: (usuarioActualizado) => {
    //       this.usuario = { ...usuarioActualizado };
    //       this.usuarioOriginal = { ...usuarioActualizado };
    //       this.modoEdicion = false;
    //       this.guardando = false;
    //       this.mensajeExito = 'Perfil actualizado correctamente';
    //       this.ocultarMensajeExito();
    //     },
    //     error: (error) => {
    //       this.error = 'Error al guardar el perfil. Por favor, intenta de nuevo.';
    //       this.guardando = false;
    //       console.error('Error al guardar perfil:', error);
    //     }
    //   });

    // Simulación para ejemplo
    setTimeout(() => {
      this.usuarioOriginal = { ...this.usuario };
      this.modoEdicion = false;
      this.guardando = false;
      this.mensajeExito = 'Perfil actualizado correctamente';
      this.ocultarMensajeExito();
    }, 1500);
  }

  /**
   * Cancelar edición y restaurar datos originales
   */
  cancelarEdicion(): void {
    this.usuario = { ...this.usuarioOriginal };
    this.modoEdicion = false;
    this.limpiarMensajes();
    this.archivoSeleccionado = null;
    this.vistaPrevia = null;
  }

  /**
   * Validar formulario antes de guardar
   */
  private validarFormulario(): boolean {
    if (!this.usuario.nombre || !this.usuario.email) {
      this.error = 'Nombre y email son campos requeridos';
      return false;
    }

    if (this.usuario.email && !this.isValidEmail(this.usuario.email)) {
      this.error = 'Por favor, ingresa un email válido';
      return false;
    }

    return true;
  }

  /**
   * Validar formato de email
   */
  private isValidEmail(email: string): boolean {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  /**
   * Limpiar mensajes de error y éxito
   */
  private limpiarMensajes(): void {
    this.error = null;
    this.mensajeExito = null;
  }

  /**
   * Ocultar mensaje de éxito después de unos segundos
   */
  private ocultarMensajeExito(): void {
    setTimeout(() => {
      this.mensajeExito = null;
    }, 3000);
  }

  /**
   * Abrir modal para cambiar foto
   */
  cambiarFoto(): void {
    // Abrir modal de Bootstrap
    const modal = new (window as any).bootstrap.Modal(document.getElementById('modalCambiarFoto'));
    modal.show();
  }

  /**
   * Manejar selección de archivo de imagen
   */
  onFileSelected(event: Event): void {
    const input = event.target as HTMLInputElement;
    if (input.files && input.files[0]) {
      const file = input.files[0];
      
      // Validar que sea una imagen
      if (!file.type.startsWith('image/')) {
        this.error = 'Por favor, selecciona un archivo de imagen válido';
        return;
      }

      // Validar tamaño (máximo 5MB)
      if (file.size > 5 * 1024 * 1024) {
        this.error = 'La imagen no puede ser mayor a 5MB';
        return;
      }

      this.archivoSeleccionado = file;
      
      // Crear vista previa
      const reader = new FileReader();
      reader.onload = (e) => {
        this.vistaPrevia = e.target?.result as string;
      };
      reader.readAsDataURL(file);
    }
  }

  /**
   * Subir nueva foto de perfil
   */
  subirFoto(): void {
    if (!this.archivoSeleccionado) return;

    // TODO: Implementar subida de archivo
    // this.usuarioService.subirAvatar(this.archivoSeleccionado)
    //   .pipe(takeUntil(this.destroy$))
    //   .subscribe({
    //     next: (response) => {
    //       this.usuario.avatar = response.url;
    //       this.cerrarModalFoto();
    //       this.mensajeExito = 'Foto de perfil actualizada';
    //     },
    //     error: (error) => {
    //       this.error = 'Error al subir la imagen';
    //       console.error('Error al subir avatar:', error);
    //     }
    //   });

    // Simulación para ejemplo
    setTimeout(() => {
      this.usuario.avatar = this.vistaPrevia || '';
      this.cerrarModalFoto();
      this.mensajeExito = 'Foto de perfil actualizada';
      this.ocultarMensajeExito();
    }, 1000);
  }

  /**
   * Cerrar modal de cambio de foto
   */
  private cerrarModalFoto(): void {
    const modal = (window as any).bootstrap.Modal.getInstance(document.getElementById('modalCambiarFoto'));
    if (modal) {
      modal.hide();
    }
    this.archivoSeleccionado = null;
    this.vistaPrevia = null;
  }

  /**
   * Formatear fecha para mostrar
   */
  formatearFecha(fecha: string): string {
    if (!fecha) return 'No disponible';
    return new Date(fecha).toLocaleDateString('es-GT', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  }
}