require('./bootstrap');
require('admin-lte');

import Alpine from 'alpinejs'

window.Alpine = Alpine

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'

Alpine.start()
