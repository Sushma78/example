<?php
class VideoProvider
{
    public static function getUpNext($con, $currentVideo)
    {
        $query = $con->prepare("SELECT * FROM videos
                                WHERE entityId=:entityId AND videoId != :videoId
                                AND(
                                    (season =:season AND episode > :episode) OR season > :season
                                )
                                ORDER BY season, episode ASC LIMIT 1");
    }
}
