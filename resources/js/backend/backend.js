import {Location} from './leaflet/location'
import './libs/uploadImages'
import './libs/deleteHouse'
import './libs/filepont'
import  './socket/server'
import './chart/statistic'
import './notification/notification'
import './Upload/uploadImages'

Location(
    document.querySelector('#maid'),
    mapCenter,
    zoomMaps,
)
