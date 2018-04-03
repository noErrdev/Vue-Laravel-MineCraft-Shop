<?php
declare(strict_types = 1);

namespace App\Console\Commands\User\Roles;

use App\Console\Command;
use App\Handlers\Consoe\User\Roles\DetachHandler;
use App\Exceptions\Role\DoesNotExistException as RoleDoesNotExistException;
use App\Exceptions\User\DoesNotExistException as UserDoesNotExistException;

class Detach extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:roles:detach {user} {role*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detach roles from user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param DetachHandler $handler
     *
     * @return int
     */
    public function handle(DetachHandler $handler): int
    {
        try {
            $handler->handle(
                $this->argument('user'),
                $this->argument('role')
            );

            $this->info(__('commands.user.roles.attach.success'));

            return 0;
        } catch (UserDoesNotExistException $e) {
            $this->error(__('commands.user.roles.attach.not_found.user_by_username', ['username' => $e->getCriteria()]));

            return 1;
        } catch (RoleDoesNotExistException $e) {
            $this->error(__('commands.user.roles.detach.role_not_found', ['name' => $e->getCriteria()]));

            return 1;
        }
    }
}
