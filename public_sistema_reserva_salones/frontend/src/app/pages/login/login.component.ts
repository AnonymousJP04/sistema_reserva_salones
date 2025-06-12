import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  imports: [CommonModule, FormsModule],
  standalone: true,
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {

  credentials = {
    email: '',
    password: ''
  };

  errorMessage: string | null = null;
  isLoading: boolean = false;

  constructor(private readonly authService: AuthService, private readonly router: Router){}

  login(){
    // Validaciones básicas
    if (!this.credentials.email || !this.credentials.password) {
      this.errorMessage = 'Por favor, completa todos los campos';
      return;
    }

    this.isLoading = true;
    this.errorMessage = null;

    console.log('Intentando login con:', this.credentials);

    this.authService.login(this.credentials).subscribe({
      next: (res: any) => {
        console.log('Respuesta del login:', res);
        this.authService.setToken(res.token);
        this.router.navigate(['/dashboard']);
      },
      error: (err) => {
        console.error('Error en login:', err);
        this.errorMessage = err.error?.message ?? 'Error al iniciar sesión';
        this.isLoading = false;
      },
      complete: () => {
        this.isLoading = false;
      }
    });
  }

  register(){
    this.router.navigate(['/register']);
  }
}