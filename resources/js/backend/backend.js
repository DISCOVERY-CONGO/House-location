import {Location} from './leaflet/location'
import './libs/uploadImages'
import './libs/deleteHouse'
import './libs/filepont'
import  './socket/server'
import './chart/statistic'
import './notification/notification'

Location(
    document.querySelector('#maid'),
    mapCenter,
    zoomMaps,
)

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
