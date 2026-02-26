@php
    $numeroWhatsApp = '5215527150540';

    $textoMensaje = "Hola, estoy interesado en {$propiedad->{'Nombre Kibah'}} ubicada en {$propiedad->{'Colonia'}} con {$propiedad->{'Número de Recámaras'}} recámaras y {$propiedad->{'Número de Baños'}} baños";

    $urlWhatsApp = "https://wa.me/{$numeroWhatsApp}?text=" . urlencode($textoMensaje);
@endphp

<style>
 .whatsapp-float{
  position: fixed;
  right: 18px;
  bottom: 18px;
  width: 56px;
  height: 56px;
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #25D366;
  box-shadow: 0 10px 24px rgba(0,0,0,.25);
  z-index: 99999;
  transition: transform .2s ease, box-shadow .2s ease;
}

.whatsapp-float:hover{
  transform: translateY(-2px);
  box-shadow: 0 14px 30px rgba(0,0,0,.28);
}

.whatsapp-icon{
  width: 28px;     /* ajusta si lo quieres más grande */
  height: 28px;
  object-fit: contain;
  display: block;
}

/* móvil */
@media (max-width: 480px){
  .whatsapp-float{ right: 14px; bottom: 14px; width: 54px; height: 54px; }
}
</style>
<a
  href="{{ $urlWhatsApp }}"
  class="whatsapp-float"
  target="_blank"
  rel="noopener"
  aria-label="WhatsApp"
>
  <img
    src="{{ asset('imagenes/whatsapp.png') }}"
    alt="WhatsApp"
    class="whatsapp-icon"
  />
</a>
