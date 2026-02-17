<?php

namespace app\Models;

enum ESongType: string {
    case FAVORITE = 'favorite';
    case LIKED = 'liked';
}