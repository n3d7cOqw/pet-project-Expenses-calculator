<?php

interface Expenses{
    
    public function connectDB();
    public function updateExpense(string $name, string $kind, int $expense, string $owner);
    public function getExpenses(string $owner);
    public function outExpenses();

    public function calcExpenses($obj):int;
}