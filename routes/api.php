<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\GestionCompte\GestionnaireController;
use App\Http\Controllers\API\GestionCompte\Client_dechetController;
use App\Http\Controllers\API\GestionCompte\OuvrierController;
use App\Http\Controllers\API\GestionCompte\ResponsableEtablissementController;

use App\Http\Controllers\API\GestionDechet\Commande_dechetController;
use App\Http\Controllers\API\GestionDechet\DechetController;

use App\Http\Controllers\API\GestionPanne\MecanicienController;
use App\Http\Controllers\API\GestionPanne\Reparation_camionController;
use App\Http\Controllers\API\GestionPanne\Reparateur_poubelleController;
use App\Http\Controllers\API\GestionPanne\Reparation_poubelleController;

use App\Http\Controllers\API\GestionPoubelleEtablissements\Bloc_poubelleController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\EtablissementController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\Zone_travailController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\PoubelleController;

use App\Http\Controllers\API\ProductionPoubelle\FournisseurController;
use App\Http\Controllers\API\ProductionPoubelle\StockPoubelleController;
use App\Http\Controllers\API\ProductionPoubelle\MateriauxPrimaireController;


use App\Http\Controllers\API\TransportDechet\CamionController;
use App\Http\Controllers\API\TransportDechet\DepotController;
use App\Http\Controllers\API\TransportDechet\Zone_depotController;

use App\Http\Controllers\Authentification\AuthController;
use App\Http\Controllers\Authentification\NewPasswordController;
use App\Http\Controllers\Authentification\ContactCotroller;

use App\Http\Controllers\API\Ouvrier\ViderController;
use App\Http\Controllers\API\Dashboard\CompteurController;
use App\Http\Controllers\API\Dashboard\SommeDechetController;
use App\Http\Controllers\API\Dashboard\TriageController;
use App\Http\Controllers\API\Dashboard\RegionController;
use App\Http\Controllers\API\Dashboard\DashboardEtablissementController;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();*/
 /** -------------------------------------------gestion Compte -----------------------------------------*/
            /**                 administrateurs                        */
        Route::apiResource('gestionnaire', GestionnaireController::class);
        Route::delete('/gestionnaire/hard-delete/{id}', [GestionnaireController::class, 'hdelete']);
        Route::get('/gestionnaire/restore/{id}', [GestionnaireController::class, 'restore']);
        Route::get('/gestionnaire/restoreall', [GestionnaireController::class, 'restoreAll']);
        Route::get('/gestionnaire/trash', [GestionnaireController::class, 'trashedAdmin']);
            /**                 client                                  */
        Route::apiResource('client', Client_dechetController::class);

            /**                  ouvrier                                */
        Route::apiResource('ouvrier', OuvrierController::class);

            /**                  responsable etablissement              */
        Route::apiResource('responsable-etablissement', ResponsableEtablissementController::class);
 /** -------------------------------------------gestion Dechet -----------------------------------------*/
            /**                  commandes                     */
        Route::apiResource('commande-dechet', Commande_dechetController::class);

            /**                  dechets                       */
        Route::apiResource('dechets', DechetController::class);
 /** -------------------------------------------gestion Panne -----------------------------------------*/
                /**                        reparateur poubelle             */
        Route::apiResource('reparateur-poubelle', Reparateur_poubelleController::class);
        Route::get('/reparateur-poubelle/serachAdresse/{adresse}', [Reparateur_poubelleController::class, 'serachAdresse']);

                /**                        mecanicien                  */
        Route::apiResource('mecanicien', MecanicienController::class);

                /**                        reparation poubelle            */
        Route::apiResource('reparation-poubelle', Reparation_poubelleController::class);

                /**                        reparation camion               */
        Route::apiResource('reparation-camion', Reparation_camionController::class);
 /** -------------------------------------------gestion Poubelle par etablissement -----------------------------------------------*/
               /**                   zone-travail                        */
        Route::apiResource('zone-travail', Zone_travailController::class);
        Route::get('/zone-travail/searchRegion/{region}', [Zone_travailController::class, 'searchRegion']);

                /**                  etablissement                      */
        Route::apiResource('etablissement', EtablissementController::class);
        Route::get('/etablissements' , [EtablissementController::class, 'index']);
        Route::get('/etablissement/searchZone_travail/{id_zone_travail}', [EtablissementController::class, 'searchZone_travail']);

                /**                  bloc-poubelle                      */
        Route::apiResource('bloc-poubelle', Bloc_poubelleController::class);
        Route::get('/bloc-poubelle/searchEtablissement/{etablissement_id}', [Bloc_poubelleController::class, 'searchEtab']);

                /**                    poubelle                        */
        Route::apiResource('poubelle', PoubelleController::class);
        Route::get('/poubelle/searchBlocPoubelle/{id_bloc_poubelle}', [PoubelleController::class, 'searchBlocPoubelle']);
        Route::get('/poubelle/searchEType/{type}', [PoubelleController::class, 'searchEType']);

 /** -------------------------------------------transport poubelle -----------------------------------------*/
              /**                       camion                            */
       Route::apiResource('camion', CamionController::class);
       Route::get('/camion/searchMatricule/{matricule}', [CamionController::class, 'searchMatricule']);

             /**                        zone depot                       */
       Route::apiResource('zone-depot', Zone_depotController::class);

             /**                       depot                            */
       Route::apiResource('depot', DepotController::class);

 /** -------------------------------------------production poubelle -----------------------------------------*/
               /**                   Fournisseur                         */
        Route::apiResource('fournisseurs', FournisseurController::class);
              /**                    Materiaux Primaires               */
        Route::apiResource('materiaux-primaires',MateriauxPrimaireController::class);
               /**                   Stock poubelle                  */
        Route::apiResource('stock-poubelle', StockPoubelleController::class);





 /** -------------------------------------------Ouvrier -----------------------------------------*/


        Route::get('/viderPoubelle/{ouvrier}/{poubelle}', [ViderController::class, 'ViderPoubelle']);
        Route::get('/viderPoubelleQr/{ouvrier}/{qr}', [ViderController::class, 'ViderPoubelleQr']);

        Route::get('/viderCamion/{depot}', [ViderController::class, 'ViderCamion']);


/** -------------------------------------------Dashboard -----------------------------------------*/
       Route::get('/dashboard', [CompteurController::class, 'dashbordValeur']);
       Route::get('/somme-total-dechet-zone-depot', [SommeDechetController::class, 'SommeDechetZoneDepot']);
       Route::get('/somme-total-dechet-zone-travail', [SommeDechetController::class, 'SommeDechetZoneTravail']);
       Route::get('/somme-total-dechet-etablissement/{zone_travail_id}', [SommeDechetController::class, 'SommeDechetBlocEtablissement']);
       Route::get('/donnee-etablissement/{id}', [DashboardEtablissementController::class, 'donnee_etablissement']);
       Route::get('/dashboard-etablissement/{id}', [DashboardEtablissementController::class, 'dashboard_etablissement']); Route::get('/dasboard', [CompteurController::class, 'dashbordValeur']);


        Route::post('/login' , [AuthController::class , 'login']);
        Route::post('/update/{id}' , [AuthController::class , 'update']);
        Route::post('/register' , [AuthController::class , 'register']);
        Route::post('/qrlogin/{test}' , [AuthController::class , 'qrlogin']);
        Route::get('/allUser' , [AuthController::class , 'index']);
        Route::post('/updatePassword/{id}' , [AuthController::class , 'updatePassword']);

        Route::post('/forgotPassword' , [ContactCotroller::class , 'send']);



        Route::get('/ip', [CompteurController::class, 'ip_get']);

        Route::get('/somme-total-dechet-zone-depot', [SommeDechetController::class, 'SommeDechetZoneDepot']);
