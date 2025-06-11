import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router, RouterModule } from '@angular/router';
import { AuthService } from '../../services/auth.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-navbar',
  standalone: true, //  Ahora es standalone
  imports: [CommonModule, FormsModule, RouterModule], //  RouterModule para poder usar Router
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css'] // Corregido: "styleUrls"
})
export class NavbarComponent {
  constructor(
    public authService: AuthService,
    private readonly router: Router
  ) {}

  logout() {
    this.authService.logout();
    this.router.navigate(['/login']);
  }

  login() {
    this.router.navigate(['/login']);
  }

  register() {
    this.router.navigate(['/register']);
  }

  dashboard() {
    this.router.navigate(['/dashboard']);
  }
}
