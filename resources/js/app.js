import '../sass/app.scss';
import * as bootstrap from 'bootstrap';
import _ from 'lodash';
import './boot';

window._ = _;
try {
    require('bootstrap');
} catch (e) {}
