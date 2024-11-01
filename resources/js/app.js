import './bootstrap';
import * as bootstrap from 'bootstrap';
new bootstrap.Popover(document.getElementById('myPopover'))

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))