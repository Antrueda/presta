<?php

namespace App\Providers;

use App\Helpers\Reporte\Controlpf;
use App\Models\Administracion\Condicio;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Administracion\Rango\Rcondici;
use App\Models\Administracion\Rango\Rnpt;
use App\Models\Administracion\Servicio;
use App\Models\Alerta;
use App\Models\Clinica\Clinica;
use App\Models\Clinica\ClinicaPaciente;
use App\Models\Clinica\Crango;
use App\Models\Clinica\MedicameSisClinica;
use App\Models\Clinica\SisClinica;
use App\Models\Dispensacione;
use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Dmarca;
use App\Models\Dispositivos\Dmedico;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Dfmlote;
use App\Models\Formulaciones\Dformula;
use App\Models\Formulaciones\Orden;
use App\Models\Itemordene;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\CasaMedicamento;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\MedicameSisClinica as MedicamentosMedicameSisClinica;
use App\Models\Medicamentos\Minvima;
use App\Models\Medicamentos\Mlote;
use App\Models\Medicamentos\Mmarca;
use App\Models\Medicamentos\Mnpt;
use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Medicamentos\Unidad\Unidrang;
use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Models\Medipin;
use App\Models\Pacientes\Paciente;
use App\Models\Pacientes\Pacientec;
use App\Models\Pacientes\PacienteServicio;
use App\Models\Permissionext;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Calistamgables;
use App\Models\Produccion\ControlP;
use App\Models\Produccion\ControlT;
use App\Models\Produccion\Preparacion;
use App\Models\Produccion\Proceso;
use App\Models\Produccion\Terminado;
use App\Models\Remision;
use App\Models\Reportes\ControlPF as ReportesControlPF;
use App\Models\Reportes\Orden as ReportesOrden;
use App\Models\Roleext;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\Models\Sistema\SisPermiso;
use App\Models\Tipoaccion;
use App\Models\Unidade;
use App\Models\Usuarios\Rol;
use App\Observers\Administracion\CondicioObserver;
use App\Observers\Dispositivos\DloteObserver;
use App\Observers\Dispositivos\DmarcaObserver;
use App\Observers\Dispositivos\DmedicoObserver;
use App\Observers\Administracion\EpObserver;
use App\Observers\Administracion\GeneroObserver;
use App\Observers\Administracion\Rango\RcodigoObserver;
use App\Observers\Administracion\Rango\RcondiciObserver;
use App\Observers\Administracion\Rango\RnptObserver;
use App\Observers\Administracion\RangoObserver;
use App\Observers\Administracion\ServicioObserver;
use App\Observers\AlertaObserver;
use App\Observers\Clinica\ClinicaObserver;
use App\Observers\Clinica\ClinicaPacienteObserver;
use App\Observers\Clinica\CrangoObserver;
use App\Observers\Clinica\MedicameSisClinicaObserver;
use App\Observers\Clinica\SisClinicaObserver;
use App\Observers\DispensacioneObserver;
use App\Observers\Formulaciones\CformulaObserver;
use App\Observers\Formulaciones\DfmloteObserver;
use App\Observers\Formulaciones\DformulaObserver;
use App\Observers\Formulaciones\OrdenObserver;
use App\Observers\ItemordeneObserver;
use App\Observers\Medicame\CasaObserver;
use App\Observers\Medicame\MedicameObserver;
use App\Observers\Medicame\MedicameSisClinicaObserver as MedicameMedicameSisClinicaObserver;
use App\Observers\Medicame\MinvimaObserver;
use App\Observers\Medicame\MloteObserver;
use App\Observers\Medicame\MmarcaObserver;
use App\Observers\Medicame\MnptObserver;
use App\Observers\Pacientes\PacientecObserver;
use App\Observers\Pacientes\PacienteObserver;
use App\Observers\Medicame\Unidades\RangonptObserver;
use App\Observers\UnidadeObserver;
use App\Observers\Medicame\Unidades\UnidadObserver;
use App\Observers\Medicame\Unidades\UnidrangObserver;
use App\Observers\Medicame\Unidades\UrangnptObserver;
use App\Observers\MedipinObserver;
use App\Observers\Pacientes\PacienteServicioObserver;
use App\Observers\PermissionextObserver;
use App\Observers\Produccion\CalistamgablesObserver;
use App\Observers\Produccion\CalistamObserver;
use App\Observers\Produccion\ControlPObserver;
use App\Observers\Produccion\ControlTObserver;
use App\Observers\Produccion\PreparacionObserver;
use App\Observers\Produccion\ProcesoObserver;
use App\Observers\Produccion\TerminadoObserver;
use App\Observers\RemisionObserver;
use App\Observers\Reportes\ControlPFObserver;
use App\Observers\Reportes\OrdenObserver as ReportesOrdenObserver;
use App\Observers\RoleextObserver;
use App\Observers\Sistema\DepartamentoObserver;
use App\Observers\Sistema\MunicipioObserver;
use App\Observers\Sistema\SisEstaObserver;
use App\Observers\Sistema\SisPermisoObserver;
use App\Observers\TipoaccionObserver;
use App\Observers\Usuarios\RolObserver;
use App\Observers\Usuarios\UsersObserver;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Rangonpt::observe(RangonptObserver::class);
        Rango::observe(RangoObserver::class);
        Servicio::observe(ServicioObserver::class);
        Ep::observe(EpObserver::class);
        Genero::observe(GeneroObserver::class);
        Condicio::observe(CondicioObserver::class);
        Clinica::observe(ClinicaObserver::class);
        ClinicaPaciente::observe(ClinicaPacienteObserver::class);
        SisClinica::observe(SisClinicaObserver::class);
        Crango::observe(CrangoObserver::class);
        Cformula::observe(CformulaObserver::class);
        Dfmlote::observe(DfmloteObserver::class);
        Dlote::observe(DloteObserver::class);
        Dformula::observe(DformulaObserver::class);
        Orden::observe(OrdenObserver::class);
        ReportesOrden::observe(ReportesOrdenObserver::class);
        ReportesControlPF::observe(ControlPFObserver::class);
        Rol::observe(RolObserver::class);
        Departamento::observe(DepartamentoObserver::class);
        Municipio::observe(MunicipioObserver::class);
        SisEsta::observe(SisEstaObserver::class);
        SisPermiso::observe(SisPermisoObserver::class);
        Paciente::observe(PacienteObserver::class);
        Pacientec::observe(PacientecObserver::class);
        PacienteServicio::observe(PacienteServicioObserver::class);
        ControlP::observe(ControlPObserver::class);
        ControlT::observe(ControlTObserver::class);
        Calistam::observe(CalistamObserver::class);
        Terminado::observe(TerminadoObserver::class);
        Preparacion::observe(PreparacionObserver::class);
        Proceso::observe(ProcesoObserver::class);
        Dmarca::observe(DmarcaObserver::class);
        Dmedico::observe(DmedicoObserver::class);
        Unidad::observe(UnidadObserver::class);
        Casa::observe(CasaObserver::class);
        CasaMedicamento::observe(CasaMedicamento::class);
        Medicame::observe(MedicameObserver::class);
        MedicamentosMedicameSisClinica::observe(MedicameMedicameSisClinicaObserver::class);
        Mlote::observe(MloteObserver::class);
        Minvima::observe(MinvimaObserver::class);
        Mmarca::observe(MmarcaObserver::class);
        Mnpt::observe(MnptObserver::class);
        Urangnpt::observe(UrangnptObserver::class);
        Unidrang::observe(UnidrangObserver::class);
        Rcondici::observe(RcondiciObserver::class);
        Rnpt::observe(RnptObserver::class);
        Rcodigo::observe(RcodigoObserver::class);

        Tipoaccion::observe(TipoaccionObserver::class);
        Alerta::observe(AlertaObserver::class);
        Dispensacione::observe(DispensacioneObserver::class);
        Itemordene::observe(ItemordeneObserver::class);
        Medipin::observe(MedipinObserver::class);
        Permissionext::observe(PermissionextObserver::class);
        Remision::observe(RemisionObserver::class);
        Roleext::observe(RoleextObserver::class);
        Unidade::observe(UnidadeObserver::class);
        Calistamgables::observe(CalistamgablesObserver::class);
        User::observe(UsersObserver::class);
    }

}
