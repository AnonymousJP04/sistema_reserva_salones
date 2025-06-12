import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-register',
  imports: [ CommonModule, FormsModule ],
  standalone: true,
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {

  usuario = {
    nombre: '',
    apellido: '',
    email: '',
    telefono: '',
    nit: '',
    password: ''
  };

  mensajeError: string | null = null;
  mensajeExito: string | null = null;

  constructor(private readonly authService: AuthService, private readonly router: Router){}

  registrar(){
    // Temporal: para ver qué datos se envían
    console.log('Datos que se envían:', this.usuario);
    
    this.authService.register(this.usuario).subscribe({
      next: (response) => {
        console.log('Respuesta del servidor:', response);
        this.mensajeExito = 'Registro exitoso, redirigiendo a inicio de sesión...';
        setTimeout(() => {
          this.router.navigate(['/login']);
        }, 3000);
      },
      error: (err) => {
        console.error('Error completo:', err);
        this.mensajeError = err.error?.message ?? 'Error al registrar el usuario';
      }
    });
  }

  login(){
    this.router.navigate(['/login']);
  }

}