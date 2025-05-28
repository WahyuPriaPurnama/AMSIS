import './bootstrap';
import * as bootstrap from 'bootstrap';

new bootstrap.Popover(document.getElementById('myPopover'));
new bootstrap.Tooltip(document.getElementById('tooltip'));

const player = new Streamedian.WSPlayer('player', {  
     url: 'rtsp://admin:AIHBRY@162.120.184.37:555', 
     rtsp_transport: 'tcp' // or 'udp' 
    });