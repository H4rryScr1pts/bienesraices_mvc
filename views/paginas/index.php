<main class="contenedor seccion">
  <h1>Más Sobre Nosotros</h1>
  <?php include "iconos.php"; ?>
</main>
<!-- Casas en venta -->
<section class="seccion contenedor">
  <div></div>
  <h1>Propiedades Publicadas Receintemente</h1>
  <?php include "listado.php"; ?>
  <div class="alinear-derecha">
    <a href="/propiedades" class="boton-verde">Ver todas</a>
  </div>
</section>
<!-- Seccion de contacto -->
<section class="imagen-contacto">
  <h2>Encuentra la Casa de tus Sueños</h2>
  <p>Llena nuestro formulario y nos pondremos en contacto contigo</p>
  <a href="/contacto" class="btn btn-success btn-lg">Contáctanos</a>
</section>
<!-- Blog y testimoniales -->
<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="/build/img/blog1.jpg" type="image/jpeg" />
          <source srcset="/build/img/blog1.webp" type="image/webp" />
          <img loading="lazy" src="/build/img/blog2.jpg" alt="entrada blog" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="/blog">
          <h4>Guia para la Decoración de tu Hogar</h4>
          <p class="info-meta">
            Escrito el: <span>20-07-2023</span> Por: <span>Admin</span>
          </p>
          <p>
            Maximiza el espacio de tu hogar con esta guía. Aprende a combinar
            muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="/build/img/blog2.jpg" type="image/jpeg" />
          <source srcset="/build/img/blog2.webp" type="image/webp" />
          <img loading="lazy" src="/build/img/blog1.jpg" alt="entrada blog" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="/blog">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="info-meta">
            Escrito el: <span>20-07-2023</span> Por: <span>Admin</span>
          </p>
          <p>
            Consejos para construir una terraza en tu techo con los mejores
            materiales y ahorrando dinero.
          </p>
        </a>
      </div>
    </article>
  </section>
  <!-- Testimoniales -->
  <section class="testimoniales">
    <h3>testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comportó de una excelente forma, muy buena atención y la
        casa que me ofrecieron cumple con todas mis espectativas
      </blockquote>
      <p>- Karen Flores</p>
    </div>
  </section>
</div>
<h1>Encuentranos</h1>
<div id="map">

  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7530.842179592101!2d-98.24041011201933!3d19.307525577436195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd91b2d9c16cb%3A0x639d94a3a9acfef9!2si7S%20Bienes%20Ra%C3%ADces%20S.A.%20de%20C.V.!5e0!3m2!1ses-419!2smx!4v1701560090388!5m2!1ses-419!2smx"
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
<div class="mapa">