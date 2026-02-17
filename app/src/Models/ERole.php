<?php

namespace app\Models;

enum ERole: string {
    case REGULAR = 'Regular';
    case ADMIN = 'Admin';
}