<?php
$sKey = "2549a31d21e448d196ec927d7498d403";
$wallstreetAPI =  "https://newsapi.org/v1/articles?source=the-wall-street-journal&sortBy=top&apiKey=".$sKey;

$ajArticles = file_get_contents($wallstreetAPI);

echo $ajArticles;