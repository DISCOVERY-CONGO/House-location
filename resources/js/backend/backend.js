import {Location} from './leaflet/location'
import './libs/uploadImages'
import './libs/deleteHouse'
import './libs/filepont'
import  './socket/server'
import './chart/statistic'

Location(
    document.querySelector('#maid'),
    mapCenter,
    zoomMaps,
)

