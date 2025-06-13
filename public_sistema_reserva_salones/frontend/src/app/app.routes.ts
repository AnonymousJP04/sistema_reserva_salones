import { Routes } from '@angular/router';
import { LoginComponent } from './pages/login/login.component';
import { RegisterComponent } from './pages/register/register.component';
import { DashboardComponent } from './pages/dashboard/dashboard.component';
import { BienvenidaComponent } from './pages/bienvenida/bienvenida.component'; // Agregar esta importación
import { ReservarSalonComponent } from './pages/reservar-salon/reservar-salon.component';
import { MisReservasComponent } from './pages/mis-reservas/mis-reservas.component'
import { CalendarioComponent } from './pages/calendario/calendario.component';
import { NotificacionesComponent } from './pages/notificaciones/notificaciones.component';
import { authGuard } from './guards/auth.guard';

export const routes: Routes = [
  { path: '', component: BienvenidaComponent }, // Cambiar aquí para que cargue bienvenida por defecto
  { path: 'bienvenida', component: BienvenidaComponent },
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'dashboard', component: DashboardComponent, canActivate: [authGuard] },
  { path: 'reservar-salon', component: ReservarSalonComponent, canActivate: [authGuard] },
  { path: 'mis-reservas', component: MisReservasComponent, canActivate: [authGuard], title: 'Mis Reservas' },
  { path: 'calendario', component: CalendarioComponent, canActivate: [authGuard], title: 'Calendario de Reservas' },
  { path: 'notificaciones', component: NotificacionesComponent },
  //{ path: '**', redirectTo: '' } // Cambiar para que redirija a bienvenida en caso de rutas no encontradas
];