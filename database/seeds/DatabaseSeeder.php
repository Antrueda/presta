<?php

use App\Models\Formulaciones\Hidrpedi;
use App\Models\Tipoacion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SisEstasSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(ClinicasSeeder::class);
        $this->call(SisClinicasSeeder::class);


        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(PermisosExcelSeeder::class);
        $this->call(PermisosRolAdminSeeder::class);
        $this->call(PermisosRolProfesionalSaludSeeder::class);
        $this->call(PermisosRolRevisionesSeeder::class);
        $this->call(PermisosRolPreparacionesSeeder::class);
        $this->call(PermisosRolControlProcesoSeeder::class);
        $this->call(PermisosRolControTerminadoSeeder::class);

        $this->call(AsignarRolSeeder::class);

        $this->call(UnidadsSeeder::class);
        $this->call(RangonptsSeeder::class);
        $this->call(UnidrangSeeder::class);
        $this->call(NptsSeeder::class);
        $this->call(UrangnptSeeder::class);
        $this->call(CasasSeeder::class);
        $this->call(MedicamesSeeder::class);
        $this->call(MedicameSisClinicaSeeder::class);
        $this->call(MmarcasSeeder::class);
        $this->call(MinvimasSeeder::class);
        $this->call(MlotesSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(MnptsSeeder::class);
        $this->call(GenerosSeeder::class);


        $this->call(ServiciosSeeder::class);
        $this->call(CondiciosSeeder::class);
        $this->call(PacientesSeeder::class);
        $this->call(DmedicosSeeder::class);
        $this->call(DmarcasSeeder::class);
        $this->call(DlotesSeeder::class);
        $this->call(HidrpedisSeeder::class);
        $this->call(LipopedisSeeder::class);
        $this->call(RangosSeeder::class);
        $this->call(RnptsSeeder::class);
        $this->call(RcondicisSeeder::class);
        $this->call(RcodigosSeeder::class);
        $this->call(CrangosSeeder::class);
        $this->call(TipoaccionsSeeder::class);
        $this->call(ItemOrdenesSeeder::class);
        //Iseed test
        $this->call(IOrdensTableSeeder::class);
        $this->call(ICformulasTableSeeder::class);
 
        $this->call(IDformulasTableSeeder::class);
        $this->call(IAlertasTableSeeder::class);
        $this->call(ICalistamsTableSeeder::class);
        $this->call(ICalistamgablesTableSeeder::class);
        
        $this->call(IDfmlotesTableSeeder::class);
        $this->call(IDispensacionesTableSeeder::class);
    
        $this->call(IPacienteServicioTableSeeder::class);
        $this->call(IPacienteSisClinicaTableSeeder::class);
        $this->call(IProcesosTableSeeder::class);
        $this->call(IProPreplibesTableSeeder::class);
        $this->call(IRemisionsTableSeeder::class);
        $this->call(ITerminadosTableSeeder::class);
        $this->call(IUnidadesTableSeeder::class);

    }
}
