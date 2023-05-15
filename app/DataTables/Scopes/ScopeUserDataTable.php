<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeUserDataTable implements DataTableScope
{

    public $email;
    public $name;
    public $username;
    public $password;

    public function __construct()
    {
        $this->email = request()->email ?? null;
        $this->name = request()->name ?? null;
        $this->username = request()->username ?? null;
        $this->password = request()->password ?? null;
    }


    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if (!is_null($this->email)){
            if (is_array($this->email)){
                $query->whereIn('email',$this->email);
            }else{
                $query->where('email',$this->email);
            }

        }
        if (!is_null($this->name)){
            if (is_array($this->name)){
                $query->whereIn('name',$this->name);
            }else{
                $query->where('name',$this->name);
            }

        }
        if (!is_null($this->username)){
            if (is_array($this->username)){
                $query->whereIn('username',$this->username);
            }else{
                $query->where('username',$this->username);
            }

        }
        if (!is_null($this->password)){
            if (is_array($this->password)){
                $query->whereIn('password',$this->password);
            }else{
                $query->where('password',$this->password);
            }

        }


    }
}
