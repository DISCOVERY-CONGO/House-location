import {Location} from './leaflet/location'
import './uploadImages'
import './deleteHouse'
import './filepont'
import  './socket/server'

Location(
    document.querySelector('#maid'),
    mapCenter,
    zoomMaps,
)
