import '../css/app.css';
import './bootstrap'
import './frontend/modules/modal'
import "./frontend/modules/location"

import Turbolinks from 'turbolinks'
Turbolinks.start()

import './frontend/config/hamburger'
import './frontend/components/search'

import {EditProfile, CloseProfile} from './frontend/config/userModal'

EditProfile(
    document.querySelector('#editProfile'),
    document.querySelector('#editeUserProfile')
)

CloseProfile(
    document.querySelector('#closeProfile'),
    document.querySelector('#editeUserProfile')
)
