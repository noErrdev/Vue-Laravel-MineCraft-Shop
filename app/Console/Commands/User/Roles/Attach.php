<?php
declare(strict_types = 1);

namespace App\Console\Commands\User\Roles;

use App\Console\Command;
use App\Handlers\Consoe\User\Roles\AttachHandler;
use App\Exceptions\Role\DoesNotExistException as RoleDoesNotExistException;
use App\Exceptions\User\DoesNotExistException as UserDoesNotExistException;
use App\Exceptions\User\RoleAlreadyAttachedException;

class Attach extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:roles:attach {user} {role*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach roles to the user';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param AttachHandler $handler
     *
     * @return int
     */
    public function handle(AttachHandler $handler): int
    {
        try {
            $handler->handle(
                $this->argument('user'),
                $this->argument('role')
            );

            $this->info(__('commands.user.roles.attach.success'));

            return 0;
        } catch (UserDoesNotExistException $e) {
            $this->error(__('commands.user.roles.attach.user_not_found', ['username' => $e->getCriteria()]));

            return 1;
        } catch (RoleDoesNotExistException $e) {
            $this->error(__('commands.user.roles.attach.role_not_found', ['name' => $e->getCriteria()]));

            return 1;
        } catch (RoleAlreadyAttachedException $e) {
            $this->error(__('commands.user.roles.attach.already_has_role', ['name' => $e->getRole()->getName()]));

            return 1;
        }
    }
}
