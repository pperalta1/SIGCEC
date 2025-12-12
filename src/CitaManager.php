<?php
declare(strict_types=1);

class CitaManager
{
    private array $citas = [];

    public function agregarCita(string $paciente, string $fecha, string $hora): bool
    {
        if (!$this->validarCita($fecha, $hora)) {
            return false;
        }

        $this->citas[] = [
            'paciente' => $paciente,
            'fecha' => $fecha,
            'hora' => $hora
        ];

        return true;
    }

    public function reprogramarCita(int $index, string $nuevaFecha, string $nuevaHora): bool
    {
        if (!isset($this->citas[$index])) {
            return false;
        }

        if (!$this->validarCita($nuevaFecha, $nuevaHora)) {
            return false;
        }

        $this->citas[$index]['fecha'] = $nuevaFecha;
        $this->citas[$index]['hora'] = $nuevaHora;
        return true;
    }

    private function validarCita(string $fecha, string $hora): bool
    {
        $fechaValida = strtotime($fecha) !== false;
        $horaValida = preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $hora);
        return $fechaValida && $horaValida;
    }

    public function listarCitas(): array
    {
        return $this->citas;
    }
}
