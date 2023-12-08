// Funciones en DOM
document.addEventListener("DOMContentLoaded", () => {
  eventListeners();
  darkMode();
  propiedades();
});

// Eventos
function eventListeners() {
  const movileMenu = document.querySelector(".movile-menu");
  movileMenu.addEventListener("click", navResponsive);

  // Mostrar campos condicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodos)
  );
}

// Navegación responsiva
function navResponsive() {
  const navegacion = document.querySelector(".navegacion");
  navegacion.classList.toggle("mostrar");
}

// Modo Oscuro
function darkMode() {
  const prefDark = window.matchMedia("(prefers-color-scheme: dark)");
  if (prefDark.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
  prefDark.addEventListener("change", () => {
    if (prefDark.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });
  const btnDark = document.querySelector(".dark-mode-btn");
  btnDark.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
  });
}

function mostrarMetodos(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
      <div class="texto">
        <label for="telefono">Número Telefónico:</label>
        <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]"/>
        <p>Elija la fecha y la hora para ser contactado</p>
        <label for="fecha">Fecha</label>
        <input type="date" value="fecha" id="fecha" name="contacto[fecha]" />
        <label for="Hora">Hora</label>
        <input type="time" value="hora" id="hora" min="09:00" max="18:00" name="contacto[hora]"/>
      </div>
    `;
  } else {
    contactoDiv.innerHTML = `
      <div class="texto">
        <label for="email">Correo Electrónico:</label>
        <input type="email" placeholder="Tu email" id="email" name="contacto[email]" />
      </div>
    `;
  }
}

// API para mapa de Google Maps
function initMap() {
  try {
    var ubicacion = { lat: 19.0200394, lng: -98.2401507 };
    var map = new google.maps.Map(document.getElementById("map"), {
      center: ubicacion,
      zoom: 15,
    });
    var marker = new google.maps.Marker({ position: ubicacion, map: map });
  } catch (error) {
    console.log(error);
  }
}

// Función para mostrar un video de you tube
function onYouTubeIframeAPIReady() {
  try {
    var player = new YT.Player("player", {
      height: "400",
      videoId: "_fX2uSTd39E", //  ID del video de YouTube
      playerVars: {
        autoplay: 1,
        controls: 1,
        showinfo: 0,
        rel: 0,
        modestbranding: 1,
      },
    });
  } catch (error) {
    console.log(error);
  }
}

// API para obtener porpiedades
async function propiedades() {
  try {
    const resultado = await fetch(`${location.origin}/api/propiedades`);
    const propiedades = await resultado.json();

    await propiedades.forEach((propiedad) => {
      const {
        id,
        titulo,
        precio,
        imagen,
        descripcion,
        estacionamiento,
        habitaciones,
        wc,
      } = propiedad;

      const contenedor = document.createElement("DIV");
      contenedor.classList.add("anuncio");

      const img = document.createElement("IMG");
      img.setAttribute("src", `/imagenes/${imagen}`);

      const anuncio = document.createElement("DIV");
      anuncio.classList.add("contenido-auncio");

      const nombre = document.createElement("H3");
      nombre.textContent = titulo;

      const costo = document.createElement("P");
      costo.classList.add("precio");
      costo.textContent = precio;

      const texto = document.createElement("P");
      texto.textContent = descripcion;

      const btn = document.createElement("A");
      btn.setAttribute("href", `/propiedad?id=${id}`);
      btn.classList.add("boton-amarillo-block");
      btn.textContent = "Ver Propiedad";

      anuncio.appendChild(nombre);
      anuncio.appendChild(costo);
      anuncio.appendChild(texto);
      anuncio.appendChild(btn);

      contenedor.appendChild(img);
      contenedor.appendChild(anuncio);
      document.querySelector(".contenedor-anuncios").appendChild(contenedor);
    });
  } catch (error) {
    console.log(error);
  }
}
