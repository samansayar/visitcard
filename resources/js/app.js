import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine;

Alpine.plugin(collapse)
Alpine.start();

