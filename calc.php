<?php
        include("functions.php");
        
        function sendBirthData(int $gebTag, int $gebMonat, int $gebJahr){
                
                $age = calcAge($gebJahr, $gebMonat, $gebTag);

                $numberOfMonths = (12 -  $gebMonat) + ( ((date("Y") - $gebJahr) - 1)  * 12) + (date("m") - 1);

                $numberOfWeeks = $numberOfMonths * 4.3482;

                $numberOfDays = $numberOfWeeks * 7;

                $numberOfHours = $numberOfDays * 24;

                $numberOfMinutes = $numberOfHours * 60;
            
                $numberOfSeconds = $numberOfMinutes * 60;

                $sendCalculatedData = array();
                $sendCalculatedData[ "YEARS" ] = round($age);
                $sendCalculatedData[ "MONTHS" ] = round($numberOfMonths);
                $sendCalculatedData[ "WEEKS" ] = round($numberOfWeeks);
                $sendCalculatedData[ "DAYS" ] = round($numberOfDays);
                $sendCalculatedData[ "HOURS" ] = round($numberOfHours);
                $sendCalculatedData[ "MINUTES" ] = round($numberOfMinutes);
                $sendCalculatedData[ "SECONDS" ] = round($numberOfSeconds);

                return $sendCalculatedData;
        }



        function getStarSignDescription(int $getMonth, int $getDay){
                $starSignDescription_arr = array();

                // 22.12. - 20.01.
                $starSignDescription_arr[ "STEINBOCK" ] = 
                        "Menschen mit dem Sternzeichen Steinbock gelten 
                        als zurückhaltend und ehrgeizig. Ihnen ist Erfolg 
                        sowie gesellschaftlicher Status besonders wichtig. 
                        Zu ihren Eigenschaften zählen Bodenständigkeit, 
                        Hartnäckigkeit und Verantwortungsbewusstsein. 
                        Sie gelten als gründlich, konservativ und vernünftig.";

                // 21.01. - 19.02.
                $starSignDescription_arr[ "WASSERMANN" ] = 
                        "Unter dem Tierkreiszeichen Wassermann Geborene 
                        (21. Januar - 19. Februar) gelten als hilfsbereit und vielseitig. 
                        Sie haben viele Ideen, gelten als unkonventionell und bringen ihre 
                        Individualität gerne zum Ausdruck. Klare gesellschaftliche Linien 
                        und Vorgaben sorgen für seinen Wunsch nach Unabhängigkeit wodurch 
                        der Wassermann-Geborene nicht selten unnahbar und reserviert wirkt.";

                // 20.02. - 20.03.
                $starSignDescription_arr[ "FISCHE" ] = 
                        "Fische sind hilfsbereit, einfühlsam, sensibel und verträumt. Sie gelten als romantisch und geheimnisvoll. Auch wird ihnen Geduld und Geselligkeit zugeschrieben."; 

                // 21.03. - 20.04.
                $starSignDescription_arr[ "WIDDER" ] = 
                        "Der typische Widder gilt als selbstbewusst, abenteuerlustig und unabhängig. Menschen mit diesem Sternzeichen sind kämpferisch und willensstark. Zu ihren Eigenschaften zählt die Zielstrebigkeit und die Ehrlichkeit. Stärken: Widder sind sehr optimistisch und voller Tatendrang."; 

                // 21.04. - 20.05.
                $starSignDescription_arr[ "STIER" ] = 
                        "Die Stiere gelten als geduldige, selbstbewusste, realistische und zuverlässige Menschen. Zu den Eigenschaften des Sternzeichens zählen auch Treue und Warmherzigkeit sowie eine schützende und bodenständige Art."; 

                // 21.05. - 21.06.
                $starSignDescription_arr[ "ZWILLINGE" ] = 
                        "Menschen mit dem Sternzeichen Zwillinge gelten als gesellig, vielseitig, kommunikativ und tolerant. Auch ein gewisser Charme wird ihnen zugeschrieben. Schwächen: Typische Zwillinge lassen sich leicht beeinflussen, wirken distanziert und oberflächlich. Sie können auch ruhelos und stressanfällig sein."; 

                // 22.06. - 22.07.
                $starSignDescription_arr[ "KREBS" ] = 
                        "Krebs-Geborene sind sehr sensibel und stark an Familie, Vergangenheit und an ihre Erinnerungen gebunden. Sie sind scheu und zurückhaltend, wenn sie neue Personen kennenlernen. In der Geborgenheit der Familie oder des Freundeskreises sind sie gut gelaunt, freundlich und hilfsbereit."; 

                // 23.07. - 23.08.
                $starSignDescription_arr[ "LOEWE" ] = 
                        "Personen, die im Sternzeichen Löwe geboren wurden, sind sehr charismatisch, optimistisch und extrovertiert. Sie strotzen vor Selbstbewusstsein und lieben es, im Mittelpunkt zu stehen. Löwe-Geborene lieben Luxus und wollen das Leben in vollen Zügen genießen."; 

                // 24.08. - 23.09.
                $starSignDescription_arr[ "JUNGFRAU" ] = 
                        "Typische Jungfrauen lieben Ordnung und alles, was mit Hygiene und gesundem Leben zu tun hat. Sie sind bodenständig und rational - man kann sich immer auf sie verlassen. Außerdem streben Jungfrau-Geborene immer nach Perfektion – was gut sein kann, solange sie sich nicht in Details verlieren und nicht vergessen, das Leben zu genießen."; 

                // 24.09. - 23.10.
                $starSignDescription_arr[ "WAAGE" ] = 
                        "Die Waage ist ein lebensfroher Mensch und hat ein sehr selbstsicheres Auftreten. Ihr Optimismus und ihre Diplomatie sind fast schon legendär – ebenso die Liebe zur Wahrheit. Das siebte Sternbild der Ekliptik ist stets um Harmonie bemüht und meidet vor allem Konflikte, bei denen es um sich selbst geht."; 

                // 24.10. - 22.11.
                $starSignDescription_arr[ "SKORPION" ] = 
                        "Skorpione wollen alles ganz genau wissen, können sich nicht mit Halbwahrheiten zufriedengeben und werden von der Kampfeslust gepackt, sobald sie das Gefühl haben, ihnen oder anderen wird Unrecht getan."; 

                // 23.11. - 21.12.
                $starSignDescription_arr[ "SCHUETZE" ] = 
                        "Das Sternzeichen ist immer aktiv und in Bewegung, regelrecht dynamisch und feurig und immer auf der Suche nach der Freiheit. Weltoffen und wissensdurstig sucht das Sternzeichen sich seine Ziele und ist dabei auch mal spontan. Neugierig und intuitiv stürzt er sich in neue Abenteuer und ist dabei immer heiter gestimmt."; 
                
                // 22.12. - 20.01. --> STEINBOCK

                if( $getMonth == 1 ){
                        if ( $getDay <= 20 ){
                                return $starSignDescription_arr[ "STEINBOCK" ];
                        }

                        if ( $getDay >= 21 ){
                                return $starSignDescription_arr[ "WASSERMANN" ];
                        }   
                }

                if( $getMonth == 2 ){
                        if ( $getDay <= 19 ){
                                return $starSignDescription_arr[ "WASSERMANN" ];
                        }

                        if ( $getDay >= 20 ){
                                return $starSignDescription_arr[ "FISCHE" ];
                        }   
                }

                if( $getMonth == 3 ){
                        if ( $getDay <= 20 ){
                                return $starSignDescription_arr[ "FISCHE" ];
                        }

                        if ( $getDay >= 21 ){
                                return $starSignDescription_arr[ "WIDDER" ];
                        }   
                }

                if( $getMonth == 4 ){
                        if ( $getDay <= 20 ){
                                return $starSignDescription_arr[ "WIDDER" ];
                        }

                        if ( $getDay >= 21 ){
                                return $starSignDescription_arr[ "STIER" ];
                        }   
                }

                if( $getMonth == 5 ){
                        if ( $getDay <= 20 ){
                                return $starSignDescription_arr[ "STIER" ];
                        }

                        if ( $getDay >= 21 ){
                                return $starSignDescription_arr[ "ZWILLINGE" ];
                        }   
                }

                if( $getMonth == 6 ){
                        if ( $getDay <= 21 ){
                                return $starSignDescription_arr[ "ZWILLINGE" ];
                        }

                        if ( $getDay >= 22 ){
                                return $starSignDescription_arr[ "KREBS" ];
                        }   
                }

                if( $getMonth == 7 ){
                        if ( $getDay <= 22 ){
                                return $starSignDescription_arr[ "KREBS" ];
                        }

                        if ( $getDay >= 23 ){
                                return $starSignDescription_arr[ "LOEWE" ];
                        }   
                }
                
                if( $getMonth == 8 ){
                        if ( $getDay <= 23 ){
                                return $starSignDescription_arr[ "LOEWE" ];
                        }

                        if ( $getDay >= 24 ){
                                return $starSignDescription_arr[ "JUNGFRAU" ];
                        }   
                }

                if( $getMonth == 9 ){
                        if ( $getDay <= 23 ){
                                return $starSignDescription_arr[ "JUNGFRAU" ];
                        }

                        if ( $getDay >= 24 ){
                                return $starSignDescription_arr[ "WAAGE" ];
                        }   
                }

                if( $getMonth == 10 ){
                        if ( $getDay <= 23 ){
                                return $starSignDescription_arr[ "WAAGE" ];
                        }

                        if ( $getDay >= 24 ){
                                return $starSignDescription_arr[ "SKORPION" ];
                        }   
                }

                if( $getMonth == 11 ){
                        if ( $getDay <= 22 ){
                                return $starSignDescription_arr[ "SKORPION" ];
                        }

                        if ( $getDay >= 23 ){
                                return $starSignDescription_arr[ "SCHUETZE" ];
                        }   
                }

                if( $getMonth == 12 ){
                        if ( $getDay <= 21 ){
                                return $starSignDescription_arr[ "SCHUETZE" ];
                        }

                        if ( $getDay >= 22 ){
                                return $starSignDescription_arr[ "STEINBOCK" ];
                        }   
                }
        }

        function getStarSignTitel( $getMonth, int $getDay ){
                if( $getMonth == 1 ){
                        if ( $getDay <= 20 ){
                                $starSignTitel = "Steinbock";
                        }

                        if ( $getDay >= 21 ){
                                $starSignTitel = "Wassermann";
                        }   
                }
                if( $getMonth == 2 ){
                        if ( $getDay <= 19 ){
                                $starSignTitel = "Wassermann";
                        }

                        if ( $getDay >= 20 ){
                                $starSignTitel = "Fische";
                        }   
                }
                if( $getMonth == 3 ){
                        if ( $getDay <= 20 ){
                                $starSignTitel = "Fische";
                        }

                        if ( $getDay >= 21 ){
                                $starSignTitel = "Widder";
                        }   
                }
                if( $getMonth == 4 ){
                        if ( $getDay <= 20 ){
                                $starSignTitel = "Widder";
                        }

                        if ( $getDay >= 21 ){
                                $starSignTitel = "Stier";
                        }   
                }
                if( $getMonth == 5 ){
                        if ( $getDay <= 20 ){
                                $starSignTitel = "Stier";
                        }

                        if ( $getDay >= 21 ){
                                $starSignTitel = "Zwillinge";
                        }   
                }
                if( $getMonth == 6 ){
                        if ( $getDay <= 21 ){
                                $starSignTitel = "Zwillinge";
                        }

                        if ( $getDay >= 22 ){
                                $starSignTitel = "Krebs";
                        }   
                }
                if( $getMonth == 7 ){
                        if ( $getDay <= 22 ){
                                $starSignTitel = "Krebs";
                        }

                        if ( $getDay >= 23 ){
                                $starSignTitel = "Löwe";
                        }   
                }
                if( $getMonth == 8 ){
                        if ( $getDay <= 23 ){
                                $starSignTitel = "Löwe";
                        }

                        if ( $getDay >= 24 ){
                                $starSignTitel = "Jungfrau";
                        }   
                }
                if( $getMonth == 9 ){
                        if ( $getDay <= 23 ){
                                $starSignTitel = "Jungfrau";
                        }

                        if ( $getDay >= 24 ){
                                $starSignTitel = "Waage";
                        }   
                }
                if( $getMonth == 10 ){
                        if ( $getDay <= 23 ){
                                $starSignTitel = "Waage";
                        }

                        if ( $getDay >= 24 ){
                                $starSignTitel = "Skorpion";
                        }   
                }
                if( $getMonth == 11 ){
                        if ( $getDay <= 22 ){
                                $starSignTitel = "Skorpion";
                        }

                        if ( $getDay >= 23 ){
                                $starSignTitel = "Schütze";
                        }   
                }
                if( $getMonth == 12 ){
                        if ( $getDay <= 21 ){
                                $starSignTitel = "Schütze";
                        }

                        if ( $getDay >= 22 ){
                                $starSignTitel = "Steinbock";
                        }   
                }
                return  $starSignTitel;
        }
?>

