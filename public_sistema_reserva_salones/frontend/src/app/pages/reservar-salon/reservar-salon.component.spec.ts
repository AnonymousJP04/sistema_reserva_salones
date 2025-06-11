import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReservarSalonComponent } from './reservar-salon.component';

describe('ReservarSalonComponent', () => {
  let component: ReservarSalonComponent;
  let fixture: ComponentFixture<ReservarSalonComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ReservarSalonComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ReservarSalonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
