/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';


    window.addEventListener('load', function() {
    const audioElement = document.getElementById('background-audio');

    // Play the audio without sound
    audioElement.play()
      .then(() => {
        // Autoplay has started, now unmute the audio
        audioElement.muted = false;
      })
      .catch((error) => {
        // Autoplay was blocked or failed, handle the error here
        console.error('Autoplay failed:', error);
      });
  });
