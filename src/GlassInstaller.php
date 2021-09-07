<?php

namespace MartinFields\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

Class GlassInstaller implements InstallerInterface
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 23);
        if ('martin-fields/glass-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"martin-fields/glass-"'
            );
        }

        return 'includes/classes/'.substr($package->getPrettyName(), 23);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'glass-module' === $packageType;
    }
}