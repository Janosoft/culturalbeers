<div class="bg-light rounded p-3">
    
    <div class="overflow-hidden">
        <h6>Completa Tú Perfil</h6>
        <div class="progress progress-sm bg-success bg-opacity-10">
            <div class="progress-bar bg-success aos aos-init aos-animate" role="progressbar"
                data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000"
                data-aos-easing="ease-in-out" style="width: {{ $usuario->porcentajeBarraEstado() }}%" aria-valuenow="85" aria-valuemin="0"
                aria-valuemax="100">
                <span class="progress-percent-simple h6 fw-light ms-auto">{{ $usuario->porcentajeBarraEstado() }}%</span>
            </div>
        </div>
        <p class="mb-0">¡Obtenga lo mejor de <strong>Cultural Beers</strong> agregando los detalles restantes!</p>
    </div>
    
    <div class="bg-body rounded p-3 mt-3">
        <ul class="list-inline hstack flex-wrap gap-2 justify-content-between mb-0">
            <li class="list-inline-item h6 fw-normal mb-0">
                @if ($usuario->email_verificado) <i class="bi bi-check-circle-fill text-success me-2"></i>Email Verificado
                @else <a href="#" class="text-primary"><i class="bi bi-plus-circle-fill me-2"></i>Email sin Verificar</a>
                @endif
            </li>
            <li class="list-inline-item h6 fw-normal mb-0">
                @if ($usuario->imagen) <i class="bi bi-check-circle-fill text-success me-2"></i>Imagen de Perfil
                @else <a href="#" class="text-primary"><i class="bi bi-plus-circle-fill me-2"></i>Sin Imagen de Perfil</a>
                @endif
            </li>
            <li class="list-inline-item h6 fw-normal mb-0">
                @if ($usuario->profesion) <i class="bi bi-check-circle-fill text-success me-2"></i>Profesión
                @else <a href="#" class="text-primary"><i class="bi bi-plus-circle-fill me-2"></i>Sin Profesión</a>
                @endif
            </li>
        </ul>
    </div>
</div>